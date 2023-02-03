<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;
    function __construct()
    {
        $this->users = new UserModel();
    }
    function index($page)
    {
        $route = 'users';
        $page = (int)$page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $sumUser = $this->users->getList()->count();
        $sumPage = ceil($sumUser / $limit);
        $users = $this->users->getListUser($offset, $limit)->all();
        return view('admin.users.list', compact('users', 'route', 'page', 'sumPage'));
    }
    function addGet()
    {
        $title = 'Thêm khách hàng';
        return view('admin.users.addEdit', compact('title'));
    }
    function addPost(UserRequest $request)
    {
        $user = $request->input();
        $this->users->addUser($user);
        return redirect()->route('admin.users.index', ['page' => 1])->with('message', 'Thêm khách hàng thành công!');
    }
    function editGet($id)
    {
        $title = 'Sửa khách hàng';
        $user = $this->users->getUser($id);
        return view('admin.users.addEdit', compact('user', 'title'));
    }
    function editPost(UserRequest $request, $id)
    {
        $user = $request->input();
        $this->users->editUser($id, $user);
        return redirect()->route('admin.users.index', ['page' => 1])->with('message', 'Sửa khách hàng thành công!');
    }
    function delete($id)
    {
        $this->users->deleteUser($id);
        return redirect()->route('admin.users.index', ['page' => 1])->with('message', 'Xóa khách hàng thành công!');
    }
    function search(Request $request)
    {
        $q = $request->input('q');
        $users = $this->users->searchUser($q)->all();
        return view('admin.users.list', compact('users', 'q'));
    }
}
