<?php

namespace App\Http\Controllers;

use App\Models\Plantele;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PlanteleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PlanteleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $planteles = Plantele::paginate();

        return view('plantele.index', compact('planteles'))
            ->with('i', ($request->input('page', 1) - 1) * $planteles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $plantele = new Plantele();

        return view('plantele.create', compact('plantele'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanteleRequest $request): RedirectResponse
    {
        Plantele::create($request->validated());

        return Redirect::route('planteles.index')
            ->with('success', 'Plantele created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $plantele = Plantele::find($id);

        return view('plantele.show', compact('plantele'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $plantele = Plantele::find($id);

        return view('plantele.edit', compact('plantele'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanteleRequest $request, Plantele $plantele): RedirectResponse
    {
        $plantele->update($request->validated());

        return Redirect::route('planteles.index')
            ->with('success', 'Plantele updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Plantele::find($id)->delete();

        return Redirect::route('planteles.index')
            ->with('success', 'Plantele deleted successfully');
    }
}
