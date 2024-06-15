<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuCreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;
use \Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menus_add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(MenuCreateFormRequest $request){
        $this->menuService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.menus_list', [
            'title' => 'Danh Sách Danh Mục',
            'menus' => $this->menuService->getAll()
        ]);
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function show(Menu $menu){
        return view('admin.menus_edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function update(Menu $menu, MenuCreateFormRequest $request){
        $this->menuService->update($menu, $request);
        return redirect('/admin/menus/list');
    }
}
