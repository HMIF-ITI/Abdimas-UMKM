<?php

namespace App\Http\Controllers;

use App\Models\PelakuUmkm;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        return view('admin/app', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function listuser(Request $request)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        $keyword = $request->keyword;
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(20);

        return view('admin/user/listuser', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'users' => $users, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function detailuser($id)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();
        $user = User::with(['transactions.detail_transactions.umkm.products'])
            ->findOrfail($id);

        return view('admin/user/detailuser', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'user' => $user, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function destroyuser($id)
    {
        User::destroy($id);
        return redirect(route('showlistuser'))->with('success', 'User Berhasil Dihapus!');
    }

    public function listowner(Request $request)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        $keyword = $request->keyword;
        $owners = PelakuUmkm::where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(20);

        return view('admin/owner/listowner', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'pelaku_umkms' => $owners, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function detailowner($id)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();
        $owner = PelakuUmkm::with(['umkms'])
            ->findOrfail($id);

        return view('admin/owner/detailowner', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'pelaku_umkm' => $owner, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function destroyowner($id)
    {
        PelakuUmkm::destroy($id);
        return redirect(route('showlistowner'))->with('success', 'Owner Berhasil Dihapus!');
    }

    public function listumkm(Request $request)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        $keyword = $request->keyword;
        $umkms = Umkm::with(['pelaku_umkm', 'category_umkm'])->where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(20);

        return view('admin/umkm/listumkm', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'umkms' => $umkms, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function detailumkm($id)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();
        $umkm = Umkm::with(['products', 'detail_transactions', 'products', 'category_umkm', 'pelaku_umkm'])
            ->findOrfail($id);

        return view('admin/umkm/detailumkm', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'umkm' => $umkm, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function destroyumkm($id)
    {
        Umkm::destroy($id);
        return redirect(route('showlistumkm'))->with('success', 'UMKM Berhasil Dihapus!');
    }

    public function listproduct(Request $request)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        $keyword = $request->keyword;
        $products = Product::with(['category_product', 'umkm'])->where('name', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(20);

        return view('admin/product/listproduct', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'products' => $products, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function detailproduct($id)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();
        $product = Product::with(['category_product', 'umkm.category_umkm', 'umkm.pelaku_umkm'])
            ->findOrfail($id);

        return view('admin/product/detailproduct', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'product' => $product, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function destroyproduct($id)
    {
        Product::destroy($id);
        return redirect(route('showlistproduct'))->with('success', 'UMKM Berhasil Dihapus!');
    }

    public function listtransaction(Request $request)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();

        $keyword = $request->keyword;
        $transactions = Transaction::with(['detail_transactions'])->where('created_at', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(20);

        return view('admin/transaction/listtransaction', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'transactions' => $transactions, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function detailtransaction($id)
    {
        $userCount = User::count();
        $umkmCount = Umkm::count();
        $ownerCount = PelakuUmkm::count();
        $transactionCount = Transaction::count();
        $productCount = Product::count();
        $transaction = Transaction::with(['detail_transactions.product.category_product', 'detail_transactions.product.umkm.category_umkm', 'user'])
            ->findOrfail($id);

        return view('admin/transaction/detailtransaction', ['owners_count' => $ownerCount, 'users_count' => $userCount, 'umkms_count' => $umkmCount, 'transaction' => $transaction, 'transactions_count' => $transactionCount, 'products_count' => $productCount]);
    }

    public function destroytransaction($id)
    {
        Transaction::destroy($id);
        return redirect(route('showlisttransaction'))->with('success', 'Transaction Berhasil Dihapus!');
    }
}
