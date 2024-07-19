<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Pelicula::paginate(10);
        return view('peliculas.PeliculasView', compact('datos'));
        //return response()->json(["mensaje" => "Datos cargados", "datos" => $datos],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::where('estado', true)->get();
        return view('peliculas.PeliculasFormView', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|max:100",
            "genero_id" => "required",
            "portada" => "url",
            "calificacion" => "integer",
        ]);
        $item = new Pelicula();
        $item->nombre = $request->nombre;
        $item->genero_id = $request->genero_id;
        $item->calificacion = $request->calificacion;
        if ($request->portada != "") {
            $item->portada = $request->portada;
        }
        if($item->save()){
            return redirect('/peliculas')->with('success', 'El registro ha sido agregado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo agregar el registro.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $datos = Pelicula::where('estado', true)->paginate(6);
        return view('peliculas.CarteleraView', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dato = Pelicula::find($id);
        $generos = Genero::where('estado', true)->get();
        return view('peliculas.PeliculasEditView', compact('dato', 'generos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "required|max:100",
            "genero_id" => "required",
            "portada" => "url",
            "calificacion" => "integer",            
        ]);
        $item = Pelicula::find($id);
        $item->nombre = $request->nombre;
        $item->genero_id = $request->genero_id;
        $item->calificacion = $request->calificacion;
        if ($request->portada != "") {
            $item->portada = $request->portada;
        }
        if($item->save()){
            return redirect('/peliculas')->with('success', 'El registro ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Pelicula::find($id);
        $item->estado = !$item->estado;
        if($item->save()){
            return redirect('/peliculas')->with('success', 'El registro ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el registro.');
        }
    }
}
