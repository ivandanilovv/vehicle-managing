<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as DbModel;

class Model extends DbModel
{
    use HasFactory;

    protected $fillable = ['name'];
}
