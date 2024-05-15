<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log; // Correct namespace for Log
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{

    use HasFactory;
    protected $fillable = ['timestamp', 'transactions', 'previousHash', 'hash', 'nounce'];

    public function __construct($transactions, $previousHash = '')
    {
        $this->timestamp = now()->toDateTimeString();
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->nonce = mt_rand();  // Initialize nonce to a random number
        $this->hash = $this->calculateHash();
    }


    public function calculateHash()
    {
        return hash('sha256', $this->previousHash . $this->timestamp . json_encode($this->transactions) . $this->nonce);
    }

    public function mineBlock($difficulty)
    {
        $target = str_repeat("0", $difficulty); // Create a string with difficulty number of "0"
        if (substr($this->hash, 0, $difficulty) !== $target) {
            $this->nonce = 0;  // Reset nonce if the current hash does not meet the target
            $this->hash = $this->calculateHash();
        }

        while (substr($this->hash, 0, $difficulty) !== $target) {
            $this->nonce++;
            $this->hash = $this->calculateHash();
        }
    }



    public function serialize()
    {
        return serialize([
            $this->timestamp,
            $this->transactions,
            $this->previousHash,
            $this->hash,
            $this->nonce
        ]);
    }

    public function unserialize($data)
    {
        list(
            $this->timestamp,
            $this->transactions,
            $this->previousHash,
            $this->hash,
            $this->nonce
        ) = unserialize($data);
    }
}
