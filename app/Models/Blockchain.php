<?php

namespace App\Models;
use App\Models\Transaction;

use Illuminate\Support\Collection;
namespace App\Models;

class Blockchain {
    public $chain;
    public $difficulty;

    public function __construct() {
        $this->chain = [new Block([], '0')]; // Genesis block
        $this->difficulty = 2;
    }

    public function getLastBlock() {
        return end($this->chain);
    }

    public function addBlock(Block $block) {
        $block->previousHash = $this->getLastBlock()->hash;
        $block->mineBlock($this->difficulty);
        $this->chain[] = $block;
    }

    public function isChainValid() {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }
        return true;
    }
}
