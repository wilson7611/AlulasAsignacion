<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semestres = Semestre::all();
        $carreras = Carrera::all();
        return view('semestres.index', compact('semestres', 'carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $semestre = Semestre::create([
            'numero' => $request->numero,
            'carrera_id' => $request->carrera_id,
        ]);

        return redirect()->route('semestres.index')->with('success', 'Semestre creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $semestre = Semestre::findOrFail($id);
        return view('semestres.delete', compact('semestre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carreras = Carrera::all();
        $semestre = Semestre::findOrFail($id);
        return view('semestres.edit', compact('semestre', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $semestre = Semestre::findOrFail($id);
        $semestre->update($request->all());
        return redirect()->route('semestres.index')->with('success', 'semestre actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semestre = Semestre::findOrFail($id);
        $semestre->delete();
        return redirect()->route('semestres.index')->with('success', 'Eliminado correctamente');
    }
}
