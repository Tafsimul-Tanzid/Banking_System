<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Define the mass-assignable fields
    protected $fillable = [
        'user_id', 'transaction_type', 'amount', 'fee', 'date',
    ];

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
