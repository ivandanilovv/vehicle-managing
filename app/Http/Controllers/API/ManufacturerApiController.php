<?php

namespace App\Http\Controllers\API;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerApiController extends Model
{
    public function index(): AnonymousResourceCollection
    {
        $manufacturers = Manufacturer::query()->paginate(10);
        return JsonResource::collection($manufacturers);
    }

}
