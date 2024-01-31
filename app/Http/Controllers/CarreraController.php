<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Decanatura;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::all();
        $decanaturas = Decanatura::all();
        return view('carreras.index', compact('carreras', 'decanaturas'));
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
        $nuevoRegistro = Carrera::create([
            'nombre' => $request->nombre,
            'decanatura_id' => $request->decanatura_id,
        ]);
        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carrera = Carrera::findOrFail($id);

        return view('carreras.delete', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        $decanaturas = Decanatura::all();
        return view('carreras.edit', compact('carrera', 'decanaturas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => ['required'],
            'decanatura_id' => ['required'],
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->update($request->all());
        return redirect()->route('carreras.index', compact('carrera'))->with('success', 'La carrera se ha actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente');
    }
}
