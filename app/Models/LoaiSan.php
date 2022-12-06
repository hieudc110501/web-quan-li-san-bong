<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSan extends Model
{
    use HasFactory;
    protected $table = 'loaisan';
    protected $primaryKey = 'MaLoaiSan';
    protected $fillable = [
        'TenLoaiSan',
        'SucChua',
        'DonGia',
        'MoTa',
        'HinhAnh',
    ];
}
