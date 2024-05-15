<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $pendingTransactions = Transaction::all();
        return view('pending.index', compact('pendingTransactions'));
    }

    public function create(Request $request)
    {
        $fromAddress = "df952bd220cecb037be12d59e7d86532b8b0b9166e1cb69bd4cb094dee2bb2c9";
        $toAddress = $request->toAddress;
        $amount = "200";

        $transactionData = $fromAddress . $toAddress . $amount;
        $signature = $this->signTransaction($transactionData);

        $transaction = Transaction::create([
            'from' => $fromAddress,
            'to' => $toAddress,
            'amount' => $amount,
            'signature' => $signature
        ]);

        return redirect()->route('pending.index')->with('message', 'Transaction created successfully!');
    }

    private function signTransaction($transactionData)
    {
        // Hash the transaction data to create a signature
        return Hash::make($transactionData);
    }
    public function mine(Request $request)
    {
        // Assume you have a Transaction model
        $transactionId = $request->input('transactionId');
        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Your logic for "mining" the transaction
        // For example, updating the transaction status
        $transaction->status = 'mined';
        $transaction->save();

        // Fetch all transactions with the current timestamp
        $transactions = Transaction::all();
        $timestamp = now(); // Get the current timestamp

        // Redirect back to the homepage with transactions data and timestamp
        return redirect()->route('home')->with('message', 'Transaction mined successfully');
    }
    public function minedTransactions()
    {
        return $this->hasMany(Transaction::class, 'parent_transaction_id');
    }
}
