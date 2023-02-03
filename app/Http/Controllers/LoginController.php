<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller
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
        return view('layouts.login', compact('carts', 'categorys', 'quantity', 'total_money'));
    }
    function login(Request $request)
    {
        $request->validate(
            ['email' => 'required|email', 'mat_khau' => 'required|min:6'],
            [
                'required' => 'Vui lòng nhập trường này!', 'email' => 'Vui lòng nhập đúng định dạng email!',
                'min' => 'Trường này tối thiểu :min ký tự!'
            ]
        );
        $input = $request->input();
        $password = md5($input['mat_khau']);
        $user = $this->users->getUserLogin($input['email'], $password);
        $admin = $this->users->getAdminLogin($input['email'], $password);
        if (isset($user)) {
            $request->session()->put('user', $user);
            return redirect()->route('index')->with('message', 'Đăng nhập thành công!');
        } else if (isset($admin)) {
            $request->session()->put('admin', $admin);
            return redirect()->route('admin.home')->with('message', 'Đăng nhập thành công!');
        } else {
            return redirect()->route('login')->with('message', ['error', 'Tài khoản không tồn tại!']);
        }
    }
    function logout($auth)
    {
        if ($auth === 'user') {
            request()->session()->forget('user');
        } else if ($auth === 'admin') {
            request()->session()->forget('admin');
        }
        return redirect()->route('login')->with('message', 'Đăng xuất thành công!');
    }
}
