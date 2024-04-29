<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'stcode',
        'dtcode',
        'deptcode',
        'deptname',
        'deptkey',
    ];

}
