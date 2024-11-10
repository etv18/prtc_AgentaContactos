<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contactos = Contacto::all();
        return view('contactos.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $etiquetas = Etiqueta::all();
        return view('contactos.create', compact('etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nombre' => 'required|string|max:80',
            'apellido' => 'nullable|string|max:80',
            'telefono' => 'required|string|max:12',
            'email' => 'nullable|email|max:80',
            'etiqueta_id' => 'nullable|exists:etiquetas,id',
            'trabajo' => 'nullable|string|max:80',
            'puesto_trabajo' => 'nullable|string|max:150',
            'nota' => 'nullable|string|max:255',
        ]);

        $contacto = Contacto::create($data);

        return to_route('contactos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
        $etiquetas = Etiqueta::all();
        return view('contactos.show', compact('etiquetas', 'contacto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
        $etiquetas = Etiqueta::all();
        return view('contactos.edit', compact('etiquetas', 'contacto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
        $data = $request->validate([
            'nombre' => 'required|string|max:80',
            'apellido' => 'nullable|string|max:80',
            'telefono' => 'required|string|max:12',
            'email' => 'nullable|email|max:80',
            'etiqueta_id' => 'nullable|exists:etiquetas,id',
            'trabajo' => 'nullable|string|max:80',
            'puesto_trabajo' => 'nullable|string|max:150',
            'nota' => 'nullable|string|max:255',
        ]);
        $etiquetas = Etiqueta::all();
        $contacto->update($data);
        return view('contactos.show', compact('contacto', 'etiquetas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        //
        $contacto->delete();
        return to_route('contactos.index');
    }
}
