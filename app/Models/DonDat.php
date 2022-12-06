<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonDat extends Model
{
    use HasFactory;
    protected $table = 'dondat';
    protected $primaryKey = 'MaDonDat';
    protected $fillable = [
        'NguoiDat',
        'NguoiXuLi',
        'NgayDat',
        'TrangThai',
        'ThanhToan',
    ];
}
