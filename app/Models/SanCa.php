<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanCa extends Model
{
    use HasFactory;
    protected $table = 'sanca';
    protected $primaryKey = 'MaSanCa';
    protected $fillable = [
        'MaSan',
        'MaCa',
    ];
}
