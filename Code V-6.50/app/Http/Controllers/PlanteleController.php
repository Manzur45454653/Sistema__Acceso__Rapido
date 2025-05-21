<?php

namespace App\Http\Controllers;

use App\Models\Plantele;
use Illuminate\Http\Request;
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
     * Display the specified resource.
     */
    public function show($id): View
    {
        $plantele = Plantele::findOrFail($id);

        return view('plantele.show', compact('plantele'));
    }

}
