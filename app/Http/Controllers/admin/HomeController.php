<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\ReportModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;
    protected $users;
    protected $orders;
    protected $report;
    function __construct()
    {
        $this->products = new ProductModel();
        $this->users = new UserModel();
        $this->orders = new OrderModel();
        $this->report = new ReportModel();
    }
    function index(Request $request)
    {
        if (session()->has('admin')) {
            $sumUser = $this->users->getList()->count();
            $sumProduct = $this->products->getList()->count();
            $sumOrderNoProcess = $this->orders->getOrderNoProcess()->count();
            $sumOrderProcess = $this->orders->getOrderProcess()->count();
            $active = 'active';
            return view('admin.home', compact('active', 'sumUser', 'sumProduct', 'sumOrderProcess', 'sumOrderNoProcess'));
        } else {
            return redirect()->route('login')->with('message', ['error', 'Vui lòng đăng nhập!']);
        }
    }
    function report()
    {
        $report = $this->report->getReport();
        return view('admin.report', compact('report'));
    }
}
