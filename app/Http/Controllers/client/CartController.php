<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class CartController extends Controller
{
    protected $products;
    protected $carts;
    protected $orders;
    protected $categorys;
    private $quantity = 1;
    function __construct()
    {
        $this->products = new ProductModel();
        $this->carts = new CartModel();
        $this->orders = new OrderModel();
        $this->categorys = new CategoryModel();
    }
    function index()
    {
        $carts = $this->carts->getList()->all();
        $total_money = $this->carts->getTotalMoney();
        $categorys = $this->categorys->getList()->all();
        $quantity = $this->carts->getQuantityCart();
        return view('clients.carts', compact('carts', 'total_money', 'categorys', 'quantity'));
    }
    function upQuantity($id)
    {
        $cart = $this->carts->getProductCart($id);
        $product = $this->products->getProduct($id);
        if ($cart->soluong < $product->soluong) {
            $quantity = $cart->soluong + 1;
            $total_price = $cart->gia * $quantity;
            $this->carts->updateQuantity($id, $quantity, $total_price);
        }
        return redirect()->route('carts.index');
    }
    function downQuantity($id)
    {
        $cart = $this->carts->getProductCart($id);
        if ($cart->soluong > 0) {
            $quantity = $cart->soluong - 1;
            $total_price = $cart->gia * $quantity;
            $this->carts->updateQuantity($id, $quantity, $total_price);
        }
        return redirect()->route('carts.index');
    }
    function addCart($id)
    {
        $checkProduct = $this->carts->getProductCart($id);
        $product = $this->products->getProduct($id);
        if (request()->has('chi_tiet_san_pham')) {
            $getQuantity = request()->input('so_luong');
            if (!empty($checkProduct)) {
                if ($checkProduct->soluong < $product->soluong) {
                    $quantity = $checkProduct->soluong + $getQuantity;
                    $total_price = $checkProduct->gia * $quantity;
                    $this->carts->updateQuantity($id, $quantity, $total_price);
                    return redirect()->route('carts.index')->with('message', 'Cập nhật số lượng sản phẩm thành công!');
                }
            } else {
                $cart = [
                    'idsp' => $product->idsp,
                    'idloai' => $product->idloai,
                    'gia' => $product->gia,
                    'soluong' => $getQuantity,
                    'anh' => $product->anh,
                    'tonggia' => $product->gia * $getQuantity,
                ];
                $this->carts->addCart($cart);
                return redirect()->route('carts.index')->with('message', 'Thêm sản phẩm vào giỏ hàng thành công!');
            }
        } else {
            if (!empty($checkProduct)) {
                if ($checkProduct->soluong < $product->soluong) {
                    $quantity = $checkProduct->soluong + 1;
                    $total_price = $checkProduct->gia * $quantity;
                    $this->carts->updateQuantity($id, $quantity, $total_price);
                    return redirect()->route('carts.index')->with('message', 'Cập nhật số lượng sản phẩm thành công!');
                }
            } else {
                $cart = [
                    'idsp' => $product->idsp,
                    'idloai' => $product->idloai,
                    'gia' => $product->gia,
                    'soluong' => $this->quantity,
                    'anh' => $product->anh,
                    'tonggia' => $product->gia * $this->quantity,
                ];
                $this->carts->addCart($cart);
                return redirect()->route('carts.index')->with('message', 'Thêm sản phẩm vào giỏ hàng thành công!');
            }
        }
    }
    function delete($id)
    {
        $this->carts->deleteCart($id);
        return redirect()->route('carts.index')->with('message', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
    }
    function deleteAllCart()
    {
        $this->carts->deleteAll();
        return redirect()->route('carts.index')->with('message', 'Xóa tất cả sản phẩm khỏi giỏ hàng thành công!');
    }
    function pay()
    {
        if (session()->has('user')) {
            $listProduct = $this->carts->getList()->all();
            if ($listProduct) {
                $code = rand(0, 99999);
                $date = date("Y-m-d");
                $status = 0;
                $total_money = $this->carts->getTotalMoney();
                $order = [
                    'idkh' => session('user')->idkh,
                    'sdt' => session('user')->sdt,
                    'dhcode' => $code,
                    'diachi' => session('user')->diachi,
                    'ngaydathang' => $date,
                    'trangthai' => $status,
                    'tongtien' => $total_money
                ];
                $this->orders->addOrder($order);
                foreach ($listProduct as $item) {
                    $orderDetails = [
                        'idsp' => $item->idsp,
                        'dhcode' => $code,
                        'gia' => $item->gia,
                        'soluong' => $item->sl,
                        'tonggia' => $item->tonggia
                    ];
                    $this->orders->addOrderDetails($orderDetails);
                }
                $this->carts->deleteAll();
                return redirect()->route('info')->with('message', 'Thanh toán thành công!');
            } else {
                return redirect()->route('products')->with('message', ['error', 'Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán!']);
            }
        } else {
            return redirect()->route('login')->with('message', ['error', 'Vui lòng đăng nhập để thanh toán!']);
        }
    }
    function payGet()
    {
        if (session()->has('user')) {
            $code = rand(0, 99999);
            $date = date("Y-m-d");
            $status = 0;
            $product = request()->input();
            $order = [
                'idkh' => session('user')->idkh,
                'sdt' => session('user')->sdt,
                'dhcode' => $code,
                'diachi' => session('user')->diachi,
                'ngaydathang' => $date,
                'trangthai' => $status,
                'tongtien' => $product['gia'] * $product['soluong']
            ];
            $this->orders->addOrder($order);
            $orderDetails = [
                'idsp' => $product['idsp'],
                'dhcode' => $code,
                'gia' => $product['gia'],
                'soluong' => $product['soluong'],
                'tonggia' => $product['gia'] * $product['soluong']
            ];
            $this->orders->addOrderDetails($orderDetails);
            return redirect()->route('info')->with('message', 'Thanh toán thành công!');
        } else {
            return redirect()->route('login')->with('message', ['error', 'Vui lòng đăng nhập để thanh toán!']);
        }
    }
}
