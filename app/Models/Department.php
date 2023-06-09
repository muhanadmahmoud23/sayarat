<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Department extends Authenticatable
{
    use  HasFactory;
    
    protected $fillable = [
        'id',
        'name',
    ];
}
