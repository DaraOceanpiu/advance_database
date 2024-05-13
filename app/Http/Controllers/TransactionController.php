<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        $pendingTransactions = Session::get('pendingTransactions', []);
        return view('pending.index', compact('pendingTransactions'));
    }

    public function create(Request $request)
    {
        $fromAddress = "df952bd220cecb037be12d59e7d86532b8b0b9166e1cb69bd4cb094dee2bb2c9";
        $toAddress = $request->toAddress;
        $amount = "200";

        $transactionData = $fromAddress . $toAddress . $amount;
        $signature = $this->signTransaction($transactionData);

        $transaction = [
            'id' => uniqid(),
            'timestamp' => now(),
            'from' => $fromAddress,
            'to' => $toAddress,
            'amount' => $amount,
            'signature' => $signature
        ];

        $pendingTransactions = Session::get('pendingTransactions', []);
        $pendingTransactions[] = $transaction;
        Session::put('pendingTransactions', $pendingTransactions);

        return redirect()->route('pending.index')->with('message', 'Transaction created successfully!');
    }

    public function mine(Request $request)
{
    Log::info("Mining transaction");

    $transactionId = $request->input('transactionId');
    $transactions = Session::get('pendingTransactions', []);
    $transaction = collect($transactions)->firstWhere('id', $transactionId);

    if (!$transaction) {
        Log::error("No transaction found with ID", ['transactionId' => $transactionId]);
        return back()->with('error', 'Transaction not found.');
    }

    Log::info("Transaction found", ['id' => $transaction['id']]);

    // Simulate hash and nonce for the transaction
    $transaction['hash'] = hash('sha256', serialize($transaction));
    $transaction['nonce'] = mt_rand();

    // Update session or database as necessary
    $completedBlocks = Session::get('completedBlocks', []);
    $completedBlocks[] = $transaction;
    Session::put('completedBlocks', $completedBlocks);

    // Remove transaction from pending transactions
    $transactions = array_filter($transactions, function ($t) use ($transactionId) {
        return $t['id'] !== $transactionId;
    });
    Session::put('pendingTransactions', $transactions);

    // Flash transaction data for one-time use in the view
    Session::flash('minedTransaction', $transaction);

    return redirect()->route('home')->with('success', 'Transaction mined successfully!');
}

    private function signTransaction($data)
    {
        $privateKey = '89ab45a1615c6a2c5382153d07b42dcb5c74b50ed39fb6f6421406d61bd50a4';
        return hash('sha256', $privateKey . $data);
    }

    private function verifySignature($transaction)
    {
        $publicKey = 'df952bd220cecb037be12d59e7d86532b8b0b9166e1cb69bd4cb094dee2bb2c9';
        $data = $transaction['from'] . $transaction['to'] . $transaction['amount'];
        $computedSignature = hash('sha256', $publicKey . $data);
        return $transaction['signature'] === $computedSignature;
    }
}
