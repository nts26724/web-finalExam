<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Service\Product\ProductAdminService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $productService;
    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->get();
        return view('admin.product_list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_add', [
            'title' => 'Thêm Sản Phẩm',
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
       $this ->productService->insert($request);

       return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product){
        return view('admin.product_edit', [
            'title' => 'Sửa Sản Phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if($result){
            return redirect()->route('admin.products.list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa sản phẩm thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa sản phẩm thất bại'
        ]);
    }
}
