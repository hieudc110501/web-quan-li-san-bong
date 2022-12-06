<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonDat extends Model
{
    use HasFactory;
    protected $table = 'chitietdondat';
    protected $primaryKey = 'MaChiTietDD';
    protected $fillable = [
        'MaDonDat',
        'TrangThai',
        'TongTien',
        'ThanhToan',
    ];
}
