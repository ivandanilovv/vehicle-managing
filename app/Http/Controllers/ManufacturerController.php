<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ManufacturerController extends Controller
{
    public function index(): Response
    {
        $manufacturers = Manufacturer::query()->paginate(10);
        return Inertia::render('Manufacturers/Index', compact('manufacturers'));
    }

    public function show(Manufacturer $manufacturer): Response
    {
        return Inertia::render('Manufacturers/Show', compact('manufacturer'));
    }

    public function create(): Response
    {
        return Inertia::render('Manufacturers/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);
        Manufacturer::query()->create($validated);
        return Redirect::route('manufacturers.index');
    }

    public function edit(Manufacturer $manufacturer): Response
    {
        return Inertia::render('Manufacturers/Edit', compact('manufacturer'));
    }

    public function update(Manufacturer $manufacturer, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $manufacturer->fill($validated);
        $manufacturer->save();
        return Redirect::route('manufacturers.index');
    }

    public function destroy(Manufacturer $manufacturer): RedirectResponse
    {
        $manufacturer->delete();
        return Redirect::route('manufacturers.index');
    }
}
