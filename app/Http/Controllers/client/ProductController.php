<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class ProductController extends Controller
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
    function index($id = 0)
    {
        $carts = $this->carts->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        $categorys = $this->categorys->getList()->all();
        return view('clients.products', compact('id', 'categorys', 'carts', 'quantity', 'total_money'));
    }
    function productList()
    {
        $prices = [];
        $type = '';
        $sorts = [];
        if (request()->query('price')) {
            $price = request()->query('price');
            $prices = explode(':', $price);
            if (request()->query('type')) {
                $type = request()->query('type');
            }
        } else if (request()->query('sort')) {
            $sort = request()->query('sort');
            $sorts = explode(':', $sort);
        } else if (request()->query('type')) {
            $type = request()->query('type');
        }
        $products = $this->products->handleGetProducts($prices, $type, $sorts)->all();
        return view('clients.product_list', compact('products'));
    }

    function productDetails($id)
    {
        $product = $this->products->getProduct($id);
        $productList = $this->products->getListProduct($id);
        $carts = $this->carts->getList()->all();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        return view('clients.product_details', compact('product', 'productList', 'carts', 'categorys', 'quantity', 'total_money'));
    }
}
