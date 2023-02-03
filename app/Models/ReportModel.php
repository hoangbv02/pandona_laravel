<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportModel extends Model
{
    use HasFactory;
    public function getReport()
    {
        return DB::table('loaisp')->join('sanpham', 'loaisp.idloai', 'sanpham.idloai')
            ->selectRaw('loaisp.tenloai, COUNT(*) as soluong,SUM(soluong) as tongsoluong, MAX(sanpham.gia) as giacao, 
        MIN(sanpham.gia) as giathap,  AVG(sanpham.gia) as giatb')->groupBy('loaisp.tenloai')->get();
    }
}
