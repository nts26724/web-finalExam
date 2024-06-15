<?php

namespace App\Http\Service\Menu;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class MenuService
{
    public function create($request)
    {
        try{
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (int) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm danh mục thất bại');
            return false;
        }
        return true;
    }
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(10);
    }
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
       if($menu){
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
       }
       return false;
    }
    public function update($menu, $request) : bool
    {
        if($request->input('parent_id') != $menu->id){
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (int) $request->input('active');

        $menu->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;

    }
}
