<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ca extends Model
{
    use HasFactory;
    protected $table = 'ca';
    protected $primaryKey = 'MaCa';
    protected $fillable = [
        'TuGio',
        'DenGio',
    ];
}
