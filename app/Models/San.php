<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San extends Model
{
    use HasFactory;
    protected $table = 'san';
    protected $primaryKey = 'MaSan';
    protected $fillable = [
        'MaLoaiSan',
        'TenSan',
        'TinhTrangSan',
    ];
}
