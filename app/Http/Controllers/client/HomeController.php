<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class HomeController extends Controller
{
    protected $products;
    protected $carts;
    protected $orders;
    protected $categorys;
    function __construct()
    {
        $this->products = new ProductModel();
        $this->carts = new CartModel();
        $this->orders = new OrderModel();
        $this->categorys = new CategoryModel();
    }
    function index()
    {
        $products = $this->products->getProducts(0, 10)->all();
        $carts = $this->carts->getList()->all();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        return view('clients.home', compact('products', 'carts', 'categorys', 'quantity', 'total_money'));
    }
    function info()
    {
        $orders = $this->orders->getList()->all();
        $orderDetails = $this->orders->getListOrderDetails()->all();
        $products = $this->products->getList()->all();
        $carts = $this->carts->getList()->all();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        return view('clients.info', compact('orders', 'orderDetails', 'products', 'carts', 'categorys', 'quantity', 'total_money'));
    }
    function search()
    {
        $q = request()->input('q');
        $products = $this->products->searchProduct($q)->all();
        $carts = $this->carts->getList()->all();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        return view('clients.search', compact('q', 'products', 'carts', 'categorys', 'quantity', 'total_money'));
    }
}
