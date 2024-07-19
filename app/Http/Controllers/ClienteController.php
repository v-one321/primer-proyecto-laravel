<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Cliente::paginate(10);
        return view('clientes.ClienteView', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.ClienteFormView');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|max:50",
            "apellido" => "required|max:50",
            "contacto" => "required|max:15|unique:clientes,contacto",
        ]);
        $item = new Cliente();
        $item->nombre = $request->nombre;
        $item->apellido = $request->apellido;
        $item->contacto = $request->contacto;
        if($item->save()){
            return redirect('/clientes')->with('success', 'El registro ha sido agregado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo agregar el registro.');
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
        $item = Cliente::find($id);
        return view('clientes.ClienteEditView', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "required|max:50",
            "apellido" => "required|max:50",
            "contacto" => "required|max:15|unique:clientes,contacto,$id",
        ]);
        $item = Cliente::find($id);
        $item->nombre = $request->nombre;
        $item->apellido = $request->apellido;
        $item->contacto = $request->contacto;
        if($item->save()){
            return redirect('/clientes')->with('success', 'El registro ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Cliente::find($id);
        $item->estado = !$item->estado;
        if($item->save()){
            return redirect('/clientes')->with('success', 'El registro ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el registro.');
        }
    }
}
