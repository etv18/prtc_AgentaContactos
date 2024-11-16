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
        //$contactos = Contacto::all();
        $contactos_cantidad = $etiqueta->contactos->count();
        $contactos = $etiqueta->contactos;
        /*
        if ($contactos->isEmpty()) {
            dd("No hay contactos relacionados con esta etiqueta.");
        } else {
            dd($contactos); // Muestra los contactos relacionados
        }
            */
        return view('etiquetas.show', compact('etiqueta', 'contactos_cantidad', 'contactos'));
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
    public function destroy(Request $request, Etiqueta $etiqueta)
    {
        $eliminarContactos = $request->input('helper-radio'); // 0 o 1 según el valor del radio button

        if ($eliminarContactos == 0) {
            // Quitar los contactos asociados a la etiqueta SIN Eliminarlos
            $etiqueta->contactos()->update(['etiqueta_id' => null]);
        }

        // Eliminar la etiqueta
        $etiqueta->delete();

        // Redirigir
        return to_route('contactos.index')->with('success', 'Etiqueta eliminada correctamente.');
    }


    public function removeContact($etiquetaId, $contactoId)
    {
        // Buscar la etiqueta
        $etiqueta = Etiqueta::findOrFail($etiquetaId);

        // Buscar el contacto
        $contacto = Contacto::findOrFail($contactoId);

        // Desvincular el contacto de la etiqueta (poniendo el campo etiqueta_id a null)
        $contacto->etiqueta_id = null;
        $contacto->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('etiquetas.show', $etiquetaId);
    }
}
