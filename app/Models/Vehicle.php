<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @property mixed $image_src
 * @property mixed $number
 * @property mixed $title
 * @property mixed $description
 * @property mixed $model_id
 */
class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'title', 'description', 'image_src'];

    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Model::class);
    }

    public function manufacturer(): HasOneThrough
    {
        return $this->hasOneThrough(Manufacturer::class, \App\Models\Model::class);
    }
}
