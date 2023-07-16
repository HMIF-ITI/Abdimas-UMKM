<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionUMKMController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with(['detail_transactions.umkm.pelaku_umkm'])->get();
        return view('umkm/transaction/index', ['transactions' => $transaction]);
    }

    public function confirm_payment(Transaction $transaction)
    {
        $transaction->update([
            'is_paid' => true
        ]);

        return Redirect::back();
    }
}
