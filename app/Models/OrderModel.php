<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $tableSub = 'chitietdonhang';
    function getList()
    {
        return DB::table($this->table)->join('khachhang', $this->table . '.idkh', 'khachhang.idkh')->select('*', 'donhang.sdt as sdtdh', 'donhang.diachi as dcdh')->get();
    }
    function getListOrder($offset, $limit)
    {
        return DB::table($this->table)->join('khachhang', $this->table . '.idkh', 'khachhang.idkh')
            ->select('*', 'donhang.sdt as sdtdh', 'donhang.diachi as dcdh')
            ->offset($offset)->limit($limit)->get();
    }
    function searchOrder($q)
    {
        return DB::table($this->table)->join('khachhang', $this->table . '.idkh', 'khachhang.idkh')
            ->where('khachhang.tenkh', 'like', '%' . $q . '%')
            ->select('*', 'donhang.sdt as sdtdh', 'donhang.diachi as dcdh')->get();
    }
    function getOrder($id)
    {
        return DB::table($this->table)->where('dhcode', $id)->first();
    }
    function getOrderDetails($id)
    {
        return DB::table($this->tableSub)->where('dhcode', $id)->first();
    }
    function getOrderProcess()
    {
        return DB::table($this->table)->where('trangthai', '1')->get();
    }
    function getOrderNoProcess()
    {
        return DB::table($this->table)->where('trangthai', '0')->get();
    }
    function getListOrderDetails()
    {
        return DB::table($this->tableSub)->join('sanpham', $this->tableSub . '.idsp', 'sanpham.idsp')
            ->select('*', $this->tableSub . '.soluong as sl')->get();
    }
    function getDetails($id)
    {
        return DB::table($this->tableSub)->join('sanpham', $this->tableSub . '.idsp', 'sanpham.idsp')
            ->select('*', $this->tableSub . '.soluong as sl')->where($this->tableSub . '.dhcode', $id)->get();
    }
    function addOrder($order)
    {
        return DB::table($this->table)->insert([
            'idkh' => $order['idkh'],
            'sdt' => $order['sdt'],
            'dhcode' => $order['dhcode'],
            'diachi' => $order['diachi'],
            'ngaydathang' => $order['ngaydathang'],
            'trangthai' => $order['trangthai'],
            'tongtien' => $order['tongtien']
        ]);
    }
    function addOrderDetails($orderDetails)
    {
        return DB::table($this->tableSub)->insert([
            'idsp' => $orderDetails['idsp'],
            'dhcode' => $orderDetails['dhcode'],
            'gia' => $orderDetails['gia'],
            'soluong' => $orderDetails['soluong'],
            'tongtien' => $orderDetails['tonggia']
        ]);
    }
    function editOrder($id, $order)
    {
        return DB::table($this->table)->where('dhcode', $id)->update([
            'idkh' => $order['idkh'],
            'sdt' => $order['sdt'],
            'dhcode' => $order['dhcode'],
            'diachi' => $order['diachi'],
            'ngaydathang' => $order['ngaydathang'],
            'trangthai' => $order['trangthai'],
            'tongtien' => $order['tongtien']
        ]);
    }
    function editOrderDetails($id, $orderDetails)
    {
        return DB::table($this->tableSub)->where('dhcode', $id)->update([
            'idsp' => $orderDetails['idsp'],
            'dhcode' => $orderDetails['dhcode'],
            'gia' => $orderDetails['gia'],
            'soluong' => $orderDetails['soluong'],
            'tongtien' => $orderDetails['tonggia']
        ]);
    }
    function deleteOrder($id)
    {
        return DB::table($this->table)->where('dhcode', $id)->delete();
    }
    function deleteOrderDetails($id)
    {
        return DB::table($this->tableSub)->where('dhcode', $id)->delete();
    }
}
