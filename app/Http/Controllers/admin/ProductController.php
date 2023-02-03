<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends Controller
{
    protected $products;
    protected $categorys;
    function __construct()
    {
        $this->products = new ProductModel();
        $this->categorys = new CategoryModel();
    }
    function index($page)
    {
        $route = 'products';
        $page = (int)$page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sumProduct = $this->products->getList()->count();
        $sumPage = ceil($sumProduct / $limit);
        $products = $this->products->getProducts($offset, $limit)->all();
        return view('admin.products.list', compact('products', 'route', 'page', 'sumPage'));
    }
    function addGet()
    {
        $categorys = $this->categorys->getList();
        return view('admin.products.add', compact('categorys'));
    }
    function addPost(ProductRequest $request)
    {
        $file = $request->anh;
        $file_name = $file->getClientoriginalName();
        $file->move(public_path('frontend/img'), $file_name);
        $request->merge(['anh' => $file_name]);
        $product = $request->input();
        $this->products->addProduct($product);
        return redirect()->route('admin.products.index', ['page' => 1])->with('message', 'Thêm sản phẩm thành công!');
    }
    function editGet($id)
    {
        $categorys = $this->categorys->getList();
        $product = $this->products->getProduct($id);
        return view('admin.products.edit', compact('categorys', 'product'));
    }
    function editPost(ProductRequest $request, $id)
    {
        $file = $request->anh_new;
        if(!empty($file)){
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('frontend/img'), $file_name);
            $request->merge(['anh' => $file_name]);
        }
        $product = $request->input();
        $this->products->editProduct($id, $product);
        return redirect()->route('admin.products.index', ['page' => 1])->with('message', 'Sửa sản phẩm thành công!');
    }
    function delete($id, $image)
    {
        unlink(public_path('frontend/img/' . $image));
        $this->products->deleteProduct($id);
        return redirect()->route('admin.products.index', ['page' => 1])->with('message', 'Xóa sản phẩm thành công!');
    }
    function search()
    {
        $q = request()->input('q');
        $products = $this->products->searchProduct($q)->all();
        return view('admin.products.list', compact('products', 'q'));
    }
}
