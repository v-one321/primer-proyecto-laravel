<?php

namespace App\Http\Controllers;

use App\Models\Editoriales;
use App\Models\Libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Libros::paginate(10);
        return view('LibrosView', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editoriales = Editoriales::where('estado', true)->get();
        return view('LibrosFormView', compact('editoriales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'codigo' => 'required|max:20|unique:libros,codigo',
            'cantidad' => 'required|integer',
            'precio_compra' => 'required|numeric',
            'editorial_id' => 'required'
        ]);
        $item = new Libros();
        $item->nombre = $request->nombre;
        $item->codigo = $request->codigo;
        $item->cantidad = $request->cantidad;
        $item->precio_compra = $request->precio_compra;
        $item->editorial_id = $request->editorial_id;
        $item->save();
        return redirect('/libros')->with('success', 'El libro ha sido registrado correctamente');
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
        $item = Libros::find($id);
        return view('LibrosEditView', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'codigo' => 'required|max:20|unique:libros,codigo,'.$id,
            'cantidad' => 'required|integer',
            'precio_compra' => 'required|numeric'
        ]);
        $item = Libros::find($id);
        $item->nombre = $request->nombre;
        $item->codigo = $request->codigo;
        $item->cantidad = $request->cantidad;
        $item->precio_compra = $request->precio_compra;
        $item->save();
        return redirect('/libros')->with('success', 'El libro ha sido editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Libros::find($id);
        $item->delete();
        return redirect('/libros')->with('success', 'Registro eliminado correctamente');
    }
}
