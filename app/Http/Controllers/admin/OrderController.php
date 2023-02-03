<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class OrderController extends Controller
{
    protected $orders;
    protected $users;
    protected $products;
    function __construct()
    {
        $this->orders = new OrderModel();
        $this->users = new UserModel();
        $this->products = new ProductModel();
    }
    function index($page)
    {
        $route = 'orders';
        $page = (int)$page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sumOrder = $this->orders->getList()->count();
        $sumPage = ceil($sumOrder / $limit);
        $orders = $this->orders->getListOrder($offset, $limit)->all();
        return view('admin.orders.list', compact('orders', 'route', 'page', 'sumPage'));
    }
    function addGet()
    {
        $products = $this->products->getList()->all();
        $users = $this->users->getList()->all();
        return view('admin.orders.add', compact('products', 'users'));
    }
    function details($id)
    {
        $orderDetails = $this->orders->getDetails($id)->all();
        return view('admin.orders.details', compact('orderDetails'));
    }
    function addPost(OrderRequest $request)
    {
        $inOrder = $request->input();
        $code = rand(0, 99999);
        $product = $this->products->getProduct($inOrder['id_sp']);
        $order = [
            'idkh' => $inOrder['id_kh'],
            'sdt' => $inOrder['sdt'],
            'dhcode' => $code,
            'diachi' => $inOrder['dia_chi'],
            'ngaydathang' => $inOrder['ngay_dat_hang'],
            'trangthai' => $inOrder['trang_thai'],
            'tongtien' => $inOrder['so_luong'] * $product->gia
        ];
        $orderDetails = [
            'idsp' => $inOrder['id_sp'],
            'dhcode' => $code,
            'gia' => $product->gia,
            'soluong' => $inOrder['so_luong'],
            'tonggia' => $inOrder['so_luong'] * $product->gia
        ];
        $this->orders->addOrder($order);
        $this->orders->addOrderDetails($orderDetails);
        return redirect()->route('admin.orders.index', ['page' => 1])->with('message', 'Thêm đơn hàng thành công!');
    }
    function editGet($id)
    {
        $order = $this->orders->getOrder($id);
        $orderDetails = $this->orders->getOrderDetails($id);
        $products = $this->products->getList()->all();
        $users = $this->users->getList()->all();
        return view('admin.orders.edit', compact('order', 'orderDetails', 'products', 'users'));
    }
    function editPost(OrderRequest $request, $id)
    {
        $inOrder = $request->input();
        $code = rand(0, 99999);
        $product = $this->products->getProduct($inOrder['id_sp']);
        $order = [
            'idkh' => $inOrder['id_kh'],
            'sdt' => $inOrder['sdt'],
            'dhcode' => $code,
            'diachi' => $inOrder['dia_chi'],
            'ngaydathang' => $inOrder['ngay_dat_hang'],
            'trangthai' => $inOrder['trang_thai'],
            'tongtien' => $inOrder['so_luong'] * $product->gia
        ];
        $orderDetails = [
            'idsp' => $inOrder['id_sp'],
            'dhcode' => $code,
            'gia' => $product->gia,
            'soluong' => $inOrder['so_luong'],
            'tonggia' => $inOrder['so_luong'] * $product->gia
        ];
        $this->orders->editOrder($id, $order);
        $this->orders->editOrderDetails($id, $orderDetails);
        return redirect()->route('admin.orders.index', ['page' => 1])->with('message', 'Sửa đơn hàng thành công!');
    }
    function delete($id)
    {
        $this->orders->deleteOrder($id);
        $this->orders->deleteOrderDetails($id);
        return redirect()->route('admin.orders.index', ['page' => 1])->with('message', 'Xóa đơn hàng thành công!');
    }
    function orderCancel($id)
    {
        $this->orders->deleteOrder($id);
        $this->orders->deleteOrderDetails($id);
        return redirect()->route('info')->with('message', 'Hủy đơn hàng thành công!');
    }
    function search()
    {
        $q = request()->input('q');
        $orders = $this->orders->searchOrder($q)->all();
        return view('admin.orders.list', compact('orders', 'q'));
    }
}
