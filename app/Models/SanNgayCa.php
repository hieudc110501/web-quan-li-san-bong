<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanNgayCa extends Model
{
    use HasFactory;
    protected $table = 'sanngayca';
    protected $primaryKey = 'MaSanNgayCa';
    protected $fillable = [
        'MaSanCa',
        'MaChiTietDD',
        'NgayThangNam',
        'TinhTrang',
    ];
}
