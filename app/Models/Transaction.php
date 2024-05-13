<?php

namespace App\Models;

class Transaction
{
    public $fromAddress;
    public $toAddress;
    public $amount;
    public $signature;

    public function __construct($fromAddress, $toAddress, $amount, $signature = null) {
        $this->fromAddress = $fromAddress;
        $this->toAddress = $toAddress;
        $this->amount = $amount;
        $this->signature = $signature;
    }

    // Add any necessary transaction methods here, like signing or verification
}

