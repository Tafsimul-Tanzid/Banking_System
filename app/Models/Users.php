<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password', 'account_type', 'balance',
    ];

    // hidden fields
    protected $hidden = [
        'password', 'remember_token',
    ];

    //the relationship with transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
