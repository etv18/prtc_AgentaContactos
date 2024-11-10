<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $etiquetas = Etiqueta::all();
        $contactos = Contacto::all();

        return view('etiquetas.index', compact('etiquetas', 'contactos'));
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
        //
        $data = $request->validate([
            'nombre' => 'required|max:80'
        ]);

        $etiqueta = Etiqueta::create($data);

        return to_route('contactos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiqueta $etiqueta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        //
        $data = $request->validate([
            'nombre' => 'required|max:80'
        ]);

        $etiqueta->update($data);

        return to_route('contactos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiqueta $etiqueta)
    {
        //
        $etiqueta->delete();
        return to_route('contactos.index');
    }
}
