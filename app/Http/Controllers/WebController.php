<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function __construct()
    {
        
    }

    public function index($id) {
        $products = DB::select('SELECT * FROM products ORDER BY id_product DESC LIMIT 8');
        // $products = DB::select('SELECT * FROM products ORDER BY id_product DESC');
        $quan_row = ceil(count($products)/4);
        $types = DB::table('type')->get();

        $cart_products = DB::table('cart_products')
                            ->where('id_customer', $id)
                            ->get();

        return view('web.web', compact('products', 'quan_row', 'types', 'cart_products', 'id'));
    }

    public function category($id_Log, $id_Type) {
        $products = DB::table('products')
                        ->where('id_type', $id_Type)
                        ->get();

        $quan_row = ceil(count($products)/4);
        $types = DB::table('type')->get();

        $cart_products = DB::table('cart_products')
                            ->where('id_customer', $id_Log)
                            ->get();

        $id = $id_Log;

        return view('web.web', compact('products', 'quan_row', 'types', 'cart_products', 'id'));
    }

    public function categoryOut($id_Type) {
        $products = DB::table('products')
                        ->where('id_type', $id_Type)
                        ->get();

        $quan_row = ceil(count($products)/4);
        $types = DB::table('type')->get();

        return view('web.webOut', compact('products', 'quan_row', 'types'));
    }

    public function out() {
        $products = DB::select('SELECT * FROM products ORDER BY id_product DESC');
        $quan_row = ceil(count($products)/4);
        $types = DB::table('type')->get();

        return view('web.webOut', compact('products', 'quan_row', 'types'));
    }

    public function product($id_cus, $id_pro) {
        $product = DB::table('products')
                        ->where('id_product', $id_pro)
                        ->first();

        $related_products = DB::table('products')
                                ->where('id_type', $product->id_type)
                                ->get();

        $cart_products = DB::table('cart_products')
                            ->where('id_customer', $id_cus)
                            ->get();

        $id = $id_cus;

        return view('web.detail', compact('product', 'id', 'related_products', 'cart_products'));
    }
}


