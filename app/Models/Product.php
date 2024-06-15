<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'quantity',
        'active',
        'image',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

}
