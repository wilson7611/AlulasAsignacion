<?php

namespace App\Http\Controllers;

use App\Models\Decanatura;
use Illuminate\Http\Request;

class DecanaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decanaturas = Decanatura::all();
        return view('decanaturas.index', compact('decanaturas'));
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
        $nuevaDecanatura = Decanatura::create([
            'nombre' => $request->nombre 
        ]);

        return redirect()->route('decanaturas.index')->with('success', 'Decanatura creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $decanatura = Decanatura::findOrFail($id);
        return view('decanaturas.delete', compact('decanatura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $decanatura = Decanatura::findOrFail($id);
        return view('decanaturas.edit', compact('decanatura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $decanatura = Decanatura::findOrFail($id);
        $decanatura->update($request->all());
        return redirect()->route('decanaturas.index')->with('success', 'Decanatura Actualizado exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $decanatura = Decanatura::findOrFail($id);
        $decanatura->delete();
        return redirect()->route('decanaturas.index')->with('success', 'Decanatura eliminado exitosamente');
        
    }
}
