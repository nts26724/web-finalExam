<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public  function __construct()
    {
        
    }

    public  function index ($id) {
        $products_bought = DB::table('orders_detail')
                                ->join('orders', 'orders_detail.id_order', '=', 'orders.id_order')
                                ->join('products', 'orders_detail.id_product', '=', 'products.id_product')
                                ->where('id_customer', $id)
                                ->select('orders_detail.quantity as OD_quantity', 'products.*')
                                ->get();
        
        return view('web.order', compact('products_bought'));
    }

    public function order($id) {
        $cart_products = DB::table('cart_products')
                            ->where('id_customer', $id)
                            ->get();

        DB::table('cart_products')
            ->where('id_customer', $id)
            ->delete();
                        
        $id_order = DB::table('orders')
                        ->insertGetId([
                            'id_customer' => $id,
                            'date_buy' => now()
                        ]);

        foreach ($cart_products as $cart_product) {
            DB::table('orders_detail')
                ->insert([
                    'id_order' => $id_order,
                    'id_product' => $cart_product->id_product,
                    'quantity' => $cart_product->quantity
                ]);
        }

        return redirect()->route('order', ['id' => $id]);
    }
}
