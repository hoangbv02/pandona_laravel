<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartModel extends Model
{
    use HasFactory;
    protected $carts = 'giohang';
    function getList()
    {
        return DB::table($this->carts)->join('sanpham', $this->carts . '.idsp', 'sanpham.idsp')
            ->select('*', 'giohang.soluong as sl')->get();
    }
    function getProductCart($id)
    {
        return DB::table($this->carts)->where('idsp', $id)->first();
    }
    function addCart($cart)
    {
        return DB::table('giohang')->insert([
            'idsp' => $cart['idsp'],
            'idloai' => $cart['idloai'],
            'gia' => $cart['gia'],
            'soluong' => $cart['soluong'],
            'anh' => $cart['anh'],
            'tonggia' => $cart['tonggia'],
        ]);
    }
    function updateQuantity($id, $quantity, $total_price)
    {
        return DB::table($this->carts)->where('idsp', $id)->update(['soluong' => $quantity, 'tonggia' => $total_price]);
    }
    function getTotalMoney()
    {
        return DB::table($this->carts)->sum('tonggia');
    }
    function deleteCart($id)
    {
        return DB::table($this->carts)->where('idgh', $id)->delete();
    }
    function deleteAll()
    {
        return DB::table($this->carts)->delete();
    }
    function getQuantityCart()
    {
        return DB::table($this->carts)->count();
    }
}
