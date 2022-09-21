<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;
use Inertia\Response;

class ModelController extends Controller
{
    public function index(): Response
    {
        $manufacturers = Manufacturer::all();
        $models = Model::query()->paginate(10);
        return Inertia::render('Models/Index', compact('models', 'manufacturers'));
    }

    public function show(Model $model): Response
    {
        return Inertia::render('Models/Show', compact('model'));
    }

    public function create(): Response
    {
        $manufacturers = Manufacturer::all();
        return Inertia::render('Models/Create', compact('manufacturers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $manufacturer = Manufacturer::query()->find($request['manufacturer_id']);
        $manufacturer->models()->create($validated);
        return Redirect::route('models.index');
    }

    public function edit(Model $model): Response
    {
        return Inertia::render('Models/Edit', compact('model'));
    }

    public function update(Model $model, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $model->fill($validated);
        $model->save();
        return Redirect::route('models.index');
    }

    public function destroy(Model $model): RedirectResponse
    {
        $model->delete();
        return Redirect::route('models.index');
    }

}
