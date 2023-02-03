<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'loaisp';
    function getList()
    {
        return DB::table($this->table)->get();
    }
    function getListCategory($offset, $limit)
    {
        return DB::table($this->table)->offset($offset)->limit($limit)->get();
    }
    function getCategory($id)
    {
        return DB::table($this->table)->where('idloai', $id)->first();
    }
    function addCategory($category)
    {
        return DB::table($this->table)->insert([
            'tenloai' => $category['ten_loai'],
            'mota' => $category['mo_ta']
        ]);
    }
    function editCategory($id, $category)
    {
        return DB::table($this->table)->where('idloai', $id)->update([
            'tenloai' => $category['ten_loai'],
            'mota' => $category['mo_ta']
        ]);
    }
    function deleteCategory($id)
    {
        return DB::table($this->table)->where('idloai', $id)->delete();
    }
    function searchCategory($q)
    {
        return DB::table($this->table)->where('tenloai', 'like', '%' . $q . '%')->get();
    }
}
