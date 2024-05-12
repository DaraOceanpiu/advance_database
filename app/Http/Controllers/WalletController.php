<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpseclib3\Crypt\RSA;

class WalletController extends Controller
{
    public function index()
    {
        $wallet = Session::get('wallet');
        return view('wallets.index', compact('wallet'));
    }

    public function create(Request $request)
    {
        // Generate a new RSA key pair
        $rsaKeyPair = RSA::createKey(2048);

        // The $rsaKeyPair is already an instance of phpseclib3\Crypt\RSA\PrivateKey
        $privateKey = $rsaKeyPair; // This is your private key

        // Get the public key from the private key
        $publicKey = $privateKey->getPublicKey(); // Correct way to get the public key

        // Convert keys to strings if needed
        $privateKeyString = $privateKey->toString('PKCS8');
        $publicKeyString = $publicKey->toString('PKCS8');

        // Simulate a wallet address using a SHA-256 hash of the public key string
        $walletAddress = hash('sha256', $publicKeyString);

        // Package wallet details
        $wallet = [
            'id' => uniqid(),
            'hash' => $walletAddress,
            'balance' => 200 // Set initial balance, adjust as needed
        ];

        // Store wallet details in session for demonstration purposes
        Session::put('wallet', $wallet);

        // Redirect to wallet display page
        return redirect()->route('wallets.index');
    }
}
