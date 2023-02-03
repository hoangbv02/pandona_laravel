<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class RegisterController extends Controller
{
    protected $users;
    protected $carts;
    protected $orders;
    protected $categorys;
    function __construct()
    {
        $this->users = new UserModel();
        $this->carts = new CartModel();
        $this->orders = new OrderModel();
        $this->categorys = new CategoryModel();
    }
    function index()
    {
        $carts = $this->carts->getList()->all();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        $total_money = $this->carts->getTotalMoney();
        return view('layouts.register', compact('carts', 'categorys', 'quantity', 'total_money'));
    }
    function addPost(UserRequest $request)
    {
        $user = $request->input();
        $this->users->addUser($user);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công!');;
    }
}
