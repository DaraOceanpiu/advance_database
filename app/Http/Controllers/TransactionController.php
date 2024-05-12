<?php

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
        $fromAddress = "df952bd220cecb037be12d59e7d86532b8b0b9166e1cb69bd4cb094dee2bb2c9";
        $toAddress = $request->toAddress; // You would need to pass this from the form
        $amount = "200";

        // Sign the transaction
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

        // Verify signature
        $isValid = $this->verifySignature($transaction);
        if (!$isValid) {
            return back()->with('error', 'Transaction signature is not valid.');
        }

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

    // Function to sign transaction using RSA
    private function signTransaction($data)
    {
        // Use your private key to sign the data using openssl with RSA
        $privateKey = '898ab45a1615c6a2c5382153d07b42dcb5c74b50ed39fb6f6421406d61bd50a4'; // Replace with your actual private key
        $signature = '';
        openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($signature);
    }

    // Function to verify transaction signature using RSA
    private function verifySignature($transaction)
    {
        // Use public key to verify the signature using openssl with RSA
        $publicKey = 'df952bd220cecb037be12d59e7d86532b8b0b9166e1cb69bd4cb094dee2bb2c9'; // Replace with the public key corresponding to fromAddress
        $signature = base64_decode($transaction['signature']);
        $data = $transaction['from'] . $transaction['to'] . $transaction['amount'];
        return openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA256) === 1;
    }
}
