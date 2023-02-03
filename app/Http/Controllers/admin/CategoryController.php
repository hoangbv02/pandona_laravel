<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    protected $categorys;
    function __construct()
    {
        $this->categorys = new CategoryModel();
    }
    function index($page)
    {
        $route = 'categorys';
        $page = (int)$page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sumCategory = $this->categorys->getList()->count();
        $sumPage = ceil($sumCategory / $limit);
        $categorys = $this->categorys->getListCategory($offset, $limit)->all();
        return view('admin.category.list', compact('categorys', 'route', 'page', 'sumPage'));
    }
    function addGet()
    {
        $title = 'Thêm loại sản phẩm';
        return view('admin.category.addEdit', compact('title'));
    }
    function addPost(CategoryRequest $request)
    {
        $category = $request->input();
        $this->categorys->addCategory($category);
        return redirect()->route('admin.categorys.index', ['page' => 1])->with('message', 'Thêm loại sản phẩm thành công!');
    }
    function editGet($id)
    {
        $title = 'Sửa loại sản phẩm';
        $category = $this->categorys->getCategory($id);
        return view('admin.category.addEdit', compact('category', 'title'));
    }
    function editPost($id)
    {
        $category = request()->input();
        $this->categorys->editCategory($id, $category);
        return redirect()->route('admin.categorys.index', ['page' => 1])->with('message', 'Sửa loại sản phẩm thành công!');
    }
    function delete($id)
    {
        $this->categorys->deleteCategory($id);
        return redirect()->route('admin.categorys.index', ['page' => 1])->with('message', 'Xóa loại sản phẩm thành công!');
    }
    function search()
    {
        $q = request()->input('q');
        $categorys = $this->categorys->searchCategory($q)->all();
        return view('admin.category.list', compact('categorys', 'q'));
    }
}
