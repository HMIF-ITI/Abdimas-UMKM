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

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $carts =  Cart::all();

        if ($carts == null) {
            return Redirect::back();
        }

        $user_id = Auth::user()->id;

        $transaction = Transaction::create([
            'user_id' => $user_id,
        ]);

        foreach ($carts as $cart) {
            $product = Product::find($cart->product_id);

            $product->update([
                'stock' => $product->stock - $cart->qty
            ]);

            $validated = $request->validate([
                'status' => 'required',
            ]);

            DetailTransaction::create([
                'qty' => $cart->qty,
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'umkm_id' => $cart->umkm_id,
                'user_id' => $cart->user_id,
                'status' => $validated['status'],
            ]);

            $cart->delete();
        }
        return redirect('/');
    }

    public function show_transaction()
    {
        $transaction = Transaction::with('detail_transactions')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('user/transaction/index', compact(['transaction']));
    }

    public function detail_transaction(Transaction $transaction, DetailTransaction $detailTransaction)
    {
        return view('user/transaction/detail', compact(['transaction']));
    }

    public function submit_payment_receipt(Transaction $transaction, Request $request)
    {
        $file = $request->file('payment_receipt');
        $path = time() . '_' . $transaction->id . '.' . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        $transaction->update([
            'payment_receipt' => $path
        ]);

        return Redirect::back()->with('success', 'Bukti Pembayaran Berhasil Dikirim, Tunggu Pemberitahuan Selanjutnya');
    }
}
