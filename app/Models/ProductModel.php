<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    function getList()
    {
        return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
            ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
    }
    function getProducts($offset, $limit)
    {
        return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
            ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')
            ->offset($offset)->limit($limit)->get();
    }
    function getListProduct($id)
    {
        return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
            ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->where('idsp', '!=', $id)->get();
    }
    function getProduct($id)
    {
        return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
            ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->where('idsp', $id)->first();
    }
    function addProduct($product)
    {
        return DB::table($this->table)->insert([
            'idloai' => $product['id_loai'],
            'tensp' => $product['ten_san_pham'],
            'soluong' => $product['so_luong'],
            'gia' => $product['gia'],
            'anh' => $product['anh'],
            'mota' => $product['mo_ta'],
            'ngaytao' => date('Y-m-d')
        ]);
    }
    function editProduct($id, $product)
    {
        return DB::table($this->table)->where('idsp', $id)->update([
            'idloai' => $product['id_loai'],
            'tensp' => $product['ten_san_pham'],
            'soluong' => $product['so_luong'],
            'gia' => $product['gia'],
            'anh' => $product['anh'],
            'mota' => $product['mo_ta'],
            'ngaytao' => date('Y-m-d')
        ]);
    }
    function deleteProduct($id)
    {
        return DB::table($this->table)->where('idsp', $id)->delete();
    }
    function searchProduct($q)
    {
        return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
            ->where('tensp', 'like', '%' . $q . '%')
            ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
    }
    function handleGetProducts($prices = [], $type = '', $sorts = [])
    {
        if ($prices && $type) {
            return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
                ->where($this->table . '.idloai', $type)
                ->whereBetween('gia', $prices)
                ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
        } else if ($prices) {
            return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
                ->whereBetween('gia', $prices)
                ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
        } else if ($sorts) {
            return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
                ->orderBy($sorts[0], $sorts[1])
                ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
        } else if ($type) {
            return DB::table($this->table)->join('loaisp', $this->table . '.idloai', 'loaisp.idloai')
                ->where($this->table . '.idloai', $type)
                ->select('*', $this->table . '.mota as mtsp', 'loaisp.mota as mtloai')->get();
        }
    }
}
