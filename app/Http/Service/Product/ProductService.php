<?php

namespace App\Http\Service\Product;


use App\Models\Product;

class ProductService
{
    public function get(){
        return Product::select('id', 'name', 'price', 'image', 'active')->orderbyDesc('id')->paginate(10);
    }
}
