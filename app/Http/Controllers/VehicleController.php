<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;
use Inertia\Response;

class VehicleController extends Controller
{
    public function index(): Response
    {
        $models = Model::all();
        $manufacturers = Manufacturer::all();
        $vehicles = Vehicle::all();
        return Inertia::render('Vehicles/Index', compact('vehicles', 'models', 'manufacturers'));
    }

    public function show(Vehicle $vehicle): Response
    {
        return Inertia::render('Vehicles/Show', compact('vehicle'));
    }

    public function create(): Response
    {
        $models = Model::all();
        $manufacturers = Manufacturer::query()->with('models')->get();

        return Inertia::render('Vehicles/Create', compact('models', 'manufacturers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image_src' => 'required',
            'model_id' => 'required'
        ]);


        Model::query()->find($validated['model_id'])->vehicles()->create([
            'number' => $validated['number'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image_src' => $validated['image_src']
        ]);

        return Redirect::route('vehicles.index');
    }

    public function edit(Vehicle $vehicle): Response
    {
        return Inertia::render('Vehicles/Edit', compact('vehicle'));
    }

    public function update(Vehicle $vehicle, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image_src' => 'required',
        ]);

        $vehicle->fill($validated);
        $vehicle->save();
        return Redirect::route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();
        return Redirect::route('vehicles.index');
    }

}
