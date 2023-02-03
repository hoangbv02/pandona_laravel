<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    function getList()
    {
        return DB::table($this->table)->get();
    }
    function getListUser($offset, $limit)
    {
        return DB::table($this->table)->offset($offset)->limit($limit)->get();
    }
    function getUser($id)
    {
        return DB::table($this->table)->where('idkh', $id)->first();
    }
    function getUserLogin($email, $password)
    {
        return DB::table($this->table)->where('email', $email)->where('matkhau', $password)->first();
    }
    function getAdminLogin($email, $password)
    {
        return DB::table('admin')->where('email', $email)->where('matkhau', $password)->first();
    }
    function addUser($user)
    {
        return DB::table($this->table)->insert([
            'tenkh' => $user['ten_kh'],
            'sdt' => $user['sdt'],
            'gioitinh' => $user['gioi_tinh'],
            'ngaysinh' => $user['ngay_sinh'],
            'diachi' => $user['dia_chi'],
            'email' => $user['email'],
            'matkhau' => md5($user['mat_khau'])
        ]);
    }
    function editUser($id, $user)
    {
        return DB::table($this->table)->where('idkh', $id)->update([
            'tenkh' => $user['ten_kh'],
            'sdt' => $user['sdt'],
            'gioitinh' => $user['gioi_tinh'],
            'ngaysinh' => $user['ngay_sinh'],
            'diachi' => $user['dia_chi'],
            'email' => $user['email'],
            'matkhau' => $user['mat_khau']
        ]);
    }
    function deleteUser($id)
    {
        return DB::table($this->table)->where('idkh', $id)->delete();
    }
    function searchUser($q)
    {
        return DB::table($this->table)->where('tenkh', 'like', '%' . $q . '%')->get();
    }
}
