<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Blockchain;
use App\Models\Transaction;  // Correct the import to use the Transaction model from the Models namespace
use Illuminate\Support\Facades\Session;

class BlockController extends Controller
{
        public function index()
    {
        // Check session for flash message to confirm a new block was added
        if (Session::has('status') && Session::get('status') == 'block_added') {
            Log::debug('Block added, session refreshed.');
        }
    
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
        $newBlock = new Block([new Transaction(null, 'reward-address', 200)]); // Example transaction
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
