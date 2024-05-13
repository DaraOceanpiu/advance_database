<?php

namespace App\Models;

use Illuminate\Support\Facades\Log; // Correct namespace for Log
use Illuminate\Support\Str;

class Block
{
    public $timestamp;
    public $transactions;
    public $previousHash;
    public $hash;
    public $nonce;

    public function __construct($transactions, $previousHash = '')
    {
        $this->timestamp = now()->toDateTimeString();
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->nonce = 0;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash() {
        return hash('sha256', $this->previousHash . $this->timestamp . json_encode($this->transactions) . $this->nonce);
    }

    public function mineBlock($difficulty) {
        $target = str_repeat("0", $difficulty);
        while (substr($this->hash, 0, $difficulty) !== $target) {
            $this->nonce++;
            $this->hash = $this->calculateHash();
            Log::info("Trying nonce {$this->nonce}: Hash {$this->hash}");
        }
        Log::info("Block mined with nonce {$this->nonce}, hash: {$this->hash}");
    }

    

    public function serialize() {
        return serialize([
            $this->timestamp,
            $this->transactions,
            $this->previousHash,
            $this->hash,
            $this->nonce
        ]);
    }

    public function unserialize($data) {
        list(
            $this->timestamp,
            $this->transactions,
            $this->previousHash,
            $this->hash,
            $this->nonce
        ) = unserialize($data);
    }
}
