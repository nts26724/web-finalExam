<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function __construct() {

    }

    public function index($id) {

        $cart_products = DB::table('cart_products')
                            ->join('products', 'cart_products.id_product', '=', 'products.id_product')
                            ->join('type', 'products.id_type', '=', 'type.id_type')
                            ->where('cart_products.id_customer', $id)
                            ->select('cart_products.*', 'products.*', 'type.name as type_name', 'cart_products.quantity as cart_product_qty')
                            ->get();

        $total = 0;

        foreach ($cart_products as $product) {
            $total += $product->price * $product->cart_product_qty;
        }

        return view('web.cart', compact('cart_products', 'total', 'id'));
    }

    public function add(Request $request) {
        $cart_product = DB::table('cart_products')
            ->where('id_customer', $request->input('id_customer'))
            ->where('id_product', $request->input('id_product'))
            ->first();

        if($cart_product) {
            DB::table('cart_products')
            ->where('id_customer', $request->input('id_customer'))
            ->where('id_product', $request->input('id_product'))
            ->update([
                'quantity' => DB::raw('quantity + 1')
            ]);
        } else {
            DB::table('cart_products')
            ->insert([
                'id_customer' => $request->input('id_customer'),
                'id_product' => $request->input('id_product'),
                'quantity'=> $request->input('quantity')
            ]);
        }
        
        return redirect()->back();
    }

    public function update(Request $request) {
        DB::table('cart_products')
            ->where('id_customer', $request->input('id_customer'))
            ->where('id_product', $request->input('id_product'))
            ->update([
                'quantity' => $request->input('quantity')
            ]);
        return redirect()->back();
    }

    public function delete(Request $request) {
        DB::table('cart_products')
            ->where('id_customer', $request->input('id_customer'))
            ->where('id_product', $request->input('id_product'))
            ->delete();
        return redirect()->back();
    }
}
