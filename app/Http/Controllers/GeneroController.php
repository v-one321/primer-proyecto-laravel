<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Genero::paginate(10);
        return view('generos.GeneroView', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.GeneroFormView');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|max:100|unique:generos,nombre"
        ]);
        $item = new Genero();
        $item->nombre = $request->nombre;
        if ($request->descripcion != "") {
            $item->descripcion = $request->descripcion;
        }
        if($item->save()){
            return redirect('/generos')->with('success', 'El genero ha sido agregado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo agregar el genero.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Genero::find($id);
        return view('generos.GeneroEditView', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "required|max:100|unique:generos,nombre,$id"
        ]);
        $item = Genero::find($id);
        $item->nombre = $request->nombre;
        if ($request->descripcion != "") {
            $item->descripcion = $request->descripcion;
        }
        if($item->save()){
            return redirect('/generos')->with('success', 'El genero ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el genero.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Genero::find($id);
        $item->estado = !$item->estado;
        if($item->save()){
            return redirect('/generos')->with('success', 'El genero ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el genero.');
        }
    }
}
