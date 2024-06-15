<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'name',
        'address',
        'phone',
    ];
    public function cart()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
