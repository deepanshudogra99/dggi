<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class DistMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'stcode',
        'dtcode',
        'dtname',
        'dtabbr',
        'dtkey',
        'totaloffices',
    ];
}
