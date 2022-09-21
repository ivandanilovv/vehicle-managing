<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Manufacturer extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function models(): HasMany
    {
        return $this->hasMany(\App\Models\Model::class);
    }

    public function vehicles(): HasManyThrough
    {
        return $this->hasManyThrough(Vehicle::class, \App\Models\Model::class);
    }
}
