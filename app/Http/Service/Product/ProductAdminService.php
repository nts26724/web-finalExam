<?php

namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu(){
        return Menu::all();
    }
    public function getAll(){
        return Product::all();
    }
    public function isValidatePrice($request){
        $price = $request->price;
        if($price < 0){
            Session::flash('error', 'Giá sản phẩm không hợp lệ');
            return false;
        }
        return true;
    }
    public function insert($request){
        $isValidPrice = $this->isValidatePrice($request);
        if(!$isValidPrice) return false;
        try{
            $generateName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $generateName);
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $generateName,
                'menu_id' => $request->menu_id,
                'active' => $request->active
            ]);
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch(\Exception $e){
            Session::flash('error', 'Thêm sản phẩm thất bại');
            return false;
        }
    }
    public function get(){
        return Product::
        with('menu')
            ->orderByDesc('id')
            ->paginate(5);
    }
    public function update($request, $product) : bool{
        $isValidPrice = $this->isValidatePrice($request);
        if(!$isValidPrice) return false;
        try{
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'menu_id' => $request->menu_id,
                'active' => $request->active
            ];
            if($request->hasFile('image')){
                $generateName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads'), $generateName);
                $data['image'] = $generateName;
            }
            $product->update($data);
            Session::flash('success', 'Cập nhật sản phẩm thành công');
        } catch(\Exception $e){
            Session::flash('error', 'Cập nhật sản phẩm thất bại');
            return false;
        }
        return true;
    }
    public function delete($id) : bool {
        try{
            $product = Product::findOrfail($id);
            $product->delete();
            Session::flash('success', 'Xóa sản phẩm thành công');
            return true;
        } catch(\Exception $e){
            Session::flash('error', 'Xóa sản phẩm thất bại');
            return false;
        }
    }
}
