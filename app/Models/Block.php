<?php

namespace App\Models;

use Illuminate\Support\Str;
namespace App\Models;

class Block {
    public $timestamp;
    public $transactions;
    public $previousHash;
    public $hash;
    public $nonce = 0;

    public function __construct($transactions, $previousHash = '') {
        $this->timestamp = time();
        $this->transactions = $transactions;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash() {
        return hash('sha256', $this->previousHash . $this->timestamp . json_encode($this->transactions) . $this->nonce);
    }

    public function mineBlock($difficulty) {
        while (substr($this->hash, 0, $difficulty) !== str_pad('', $difficulty, '0')) {
            $this->nonce++;
            $this->hash = $this->calculateHash();
        }
    }
}
