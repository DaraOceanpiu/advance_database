<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Blockchain;
use App\Models\Transaction;  // Correct the import to use the Transaction model from the Models namespace
use Illuminate\Support\Facades\Session;

class BlockController extends Controller
{
    public function index()
    {
        // Fetch blockchain from session or create a new one
        $blockchain = Session::get('blockchain', new Blockchain());

        // Pass blockchain data to the view
        return view('home.index', ['blockchain' => $blockchain]);
    }

    public function addBlock(Request $request)
    {
        // Fetch blockchain from session or create a new one
        $blockchain = Session::get('blockchain', new Blockchain());

        // Create a new block with transaction data (simplified here)
        $newBlock = new Block([new Transaction(null, 'reward-address', 100)]); // Example transaction
        $blockchain->addBlock($newBlock);

        // Save updated blockchain back to the session
        Session::put('blockchain', $blockchain);

        // Redirect back with a message
        return redirect()->route('home')->with('message', 'New block added!');
    }

   
    public function verifyBlockchain()
{
    // Fetch blockchain from session
    $blockchain = Session::get('blockchain', new Blockchain());

    // Verify the blockchain integrity
    $isValid = $blockchain->isChainValid();

    // Return validation result
    return redirect()->route('home')->with('message', $isValid ? 'Blockchain is valid' : 'Blockchain is not valid');
}
}
