<?php

// app/Http/Controllers/TransactionController.php

namespace App\Http\Controllers;

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
        // Example logic for handling transaction creation
        // Assuming transaction details are passed from a form
        $fromAddress = $request->fromAddress;
        $toAddress = $request->toAddress; // You would need to pass this from the form
        $amount = $request->amount;
        $transaction = [
            'id' => uniqid(),
            'timestamp' => now(),
            'from' => $fromAddress,
            'to' => $toAddress,
            'amount' => $amount,
            'signature' => 'generated_signature' // Placeholder for your signature logic
        ];

        // Add to pending transactions
        $pendingTransactions = Session::get('pendingTransactions', []);
        $pendingTransactions[] = $transaction;
        Session::put('pendingTransactions', $pendingTransactions);

        return redirect()->route('pending.index')->with('message', 'Transaction created successfully!');
    }
    public function mine(Request $request)
    {
        $transactionId = $request->input('transactionId');
        $transactions = Session::get('pendingTransactions', []);
        $transaction = collect($transactions)->firstWhere('id', $transactionId);

        // Simulate mining operation
        if ($transaction) {
            // Remove from pending transactions
            $transactions = collect($transactions)->reject(function ($t) use ($transactionId) {
                return $t['id'] === $transactionId;
            })->toArray();
            
            // Add to completed blocks (session for simplicity)
            $completedBlocks = Session::get('completedBlocks', []);
            $completedBlocks[] = $transaction;
            Session::put('completedBlocks', $completedBlocks);
            Session::put('pendingTransactions', $transactions);

            return redirect('/')->with('success', 'Transaction mined successfully!');
        }

        return back()->with('error', 'Failed to mine the transaction.');
    }
}
