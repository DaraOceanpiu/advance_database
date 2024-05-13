<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp',
        'previous_hash',
        'nonce',
        // Add other fillable attributes here
    ];

    // Define relationships if needed
    // For example, if Block has many transactions:
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Add any other custom logic or methods here
}
