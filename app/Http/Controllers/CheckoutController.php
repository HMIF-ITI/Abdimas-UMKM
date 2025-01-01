<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Midtrans\Snap;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    // public function checkout(Request $request)
    // {
    //     // Ambil data keranjang pengguna yang sedang login
    //     $carts = Cart::where('user_id', Auth::id())->get();

    //     // Validasi jika keranjang kosong
    //     if ($carts->isEmpty()) {
    //         return Redirect::back()->withErrors(['Keranjang Anda kosong!']);
    //     }

    //     // Validasi input request
    //     $validated = $request->validate([
    //         'status' => 'required',
    //     ]);

    //     // Buat transaksi baru
    //     $transaction = Transaction::create([
    //         'user_id' => Auth::id(),
    //         'is_paid' => 0, // Awalnya belum dibayar
    //         'payment_receipt' => null,
    //     ]);

    //     // Proses setiap item dalam keranjang
    //     foreach ($carts as $cart) {
    //         $product = Product::find($cart->product_id);

    //         // Cek stok produk
    //         if ($product->stock < $cart->qty) {
    //             return Redirect::back()->withErrors(['Stok produk tidak mencukupi untuk ' . $product->name]);
    //         }

    //         // Kurangi stok produk
    //         $product->update([
    //             'stock' => $product->stock - $cart->qty,
    //         ]);

    //         // Tambahkan ke detail transaksi
    //         DetailTransaction::create([
    //             'qty' => $cart->qty,
    //             'transaction_id' => $transaction->id,
    //             'product_id' => $cart->product_id,
    //             'umkm_id' => $cart->umkm_id,
    //             'user_id' => Auth::id(),
    //             'status' => $validated['status'],
    //         ]);

    //         // Hapus item dari keranjang
    //         $cart->delete();
    //     }

    //     // Redirect ke halaman transaksi
    //     return redirect()->route('transaction')->with('success', 'Checkout berhasil!');
    // }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return Redirect::back()->withErrors(['Keranjang Anda kosong!']);
        }

        $validated = $request->validate([
            'status' => 'required',
        ]);

        // Buat transaksi baru
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'is_paid' => 0,
        ]);

        $details = [];
        $total_price = 0;

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            if ($product->stock < $cart->qty) {
                return Redirect::back()->withErrors(['Stok produk tidak mencukupi untuk ' . $product->name]);
            }

            // Kurangi stok
            $product->update(['stock' => $product->stock - $cart->qty]);

            // Tambahkan detail transaksi
            DetailTransaction::create([
                'qty' => $cart->qty,
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'umkm_id' => $cart->umkm_id,
                'user_id' => $cart->user_id,
                'status' => $validated['status'],
            ]);

            // Tambahkan ke Snap API items
            $details[] = [
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => $cart->qty,
                'name' => $product->name,
            ];

            // Hitung total harga
            $total_price += $product->price * $cart->qty;

            // Hapus keranjang
            $cart->delete();
        }

        // Buat order_id
        $order_id = 'UMKM-' . $transaction->id . '-' . time();

        // Simpan order_id di transaksi
        $transaction->update(['order_id' => $order_id]);

        // Konfigurasi Snap
        $payload = [
            'transaction_details' => [
                'order_id' => $order_id, // Gunakan order_id yang baru dibuat
                'gross_amount' => $total_price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => $details,
        ];

        $snapToken = Snap::getSnapToken($payload);

        $transaction->update(['is_paid' => 1]);
        

        return view('user.transaction.payment', compact('snapToken', 'transaction'));
    }



    public function show_transaction()
    {
        $transaction = Transaction::with('detail_transactions')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('user.transaction.index', compact('transaction'));
    }


    public function detail_transaction(Transaction $transaction, DetailTransaction $detailTransaction)
    {
        return view('user/transaction/detail', compact(['transaction']));
    }

    public function submit_payment_receipt(Transaction $transaction, Request $request)
    {
        // Validasi file
        $request->validate([
            'payment_receipt' => 'required|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Simpan file
        $file = $request->file('payment_receipt');
        $path = $file->storeAs('public/payment_receipts', time() . '_' . $transaction->id . '.' . $file->getClientOriginalExtension());

        // Update transaksi
        $transaction->update([
            'payment_receipt' => $path,
            'is_paid' => 1, // Tandai sebagai sudah dibayar
        ]);

        return Redirect::back()->with('success', 'Bukti pembayaran berhasil dikirim!');
    }

    public function handleMidtransNotification(Request $request)
{
    try {
        // Buat objek notifikasi dari Midtrans
        $notification = new Notification();

        // Log data notifikasi untuk debugging
        logger()->info('Midtrans Notification:', (array) $notification);

        // Cari transaksi berdasarkan order_id
        $transaction = Transaction::where('order_id', $notification->order_id)->first();

        dd($transaction);

        if (!$transaction) {
            logger()->error('Transaksi tidak ditemukan untuk Order ID: ' . $notification->order_id);
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Perbarui status berdasarkan notifikasi dari Midtrans
        switch ($notification->transaction_status) {
            case 'capture':
            case 'settlement':
                $transaction->update(['is_paid' => 1]);
                break;

            case 'pending':
                $transaction->update(['is_paid' => 0]);
                break;

            case 'deny':
            case 'expire':
            case 'cancel':
                $transaction->update(['is_paid' => 0]);
                break;
        }

        $transaction->save();

        logger()->info('Transaksi diperbarui untuk Order ID: ' . $notification->order_id);
        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        logger()->error('Error Midtrans Notification: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}
