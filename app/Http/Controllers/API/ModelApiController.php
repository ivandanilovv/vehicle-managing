<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ModelApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $models = Model::query()->paginate(10);
        return JsonResource::collection($models);
    }
}
