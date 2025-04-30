<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $puestos = Puesto::paginate();

        return view('puesto.index', compact('puestos'))
            ->with('i', ($request->input('page', 1) - 1) * $puestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $puesto = new Puesto();

        return view('puesto.create', compact('puesto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PuestoRequest $request): RedirectResponse
    {
        Puesto::create($request->validated());

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $puesto = Puesto::find($id);

        return view('puesto.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $puesto = Puesto::find($id);

        return view('puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PuestoRequest $request, Puesto $puesto): RedirectResponse
    {
        $puesto->update($request->validated());

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Puesto::find($id)->delete();

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto deleted successfully');
    }
}
