<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if($menu -> parent_id == $parent_id) {
                $html .= '
                <tr>
                    <td>' . $menu->id . '</td>
                    <td>' . $char. $menu->name . '</td>
                    <td>' . self::active($menu->active) . '</td>
                    <td>' . $menu->updated_at . '</td>
                    <td>
                        <a href="/admin/menus/edit/' . $menu->id . '" class="btn btn-primary btn-sm">
                            Sửa
                        </a>
                       <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('.$menu->id.',\'/admin/menus/destroy\')">
                            Xóa
                       </a>
                    </td>
                </tr>
             ';
                unset($menus[$key]);
                $html .= self::menu($menus, $menu->id, $char . '--');
            }
        }
        return $html;
    }
    public static function active($active = 0){
        return $active == 0 ? '<span class="btn btn-danger">Không</span>' : '<span class="btn btn-success">Có</span>';
    }
}
