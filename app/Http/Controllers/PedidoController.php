<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Pedido::paginate(10);
        return view('pedidos.PedidoView', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::where('estado', true)->get();
        $peliculas = Pelicula::where('estado', true)->get();
        return view('pedidos.PedidoFormView', compact('clientes', 'peliculas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "cliente_id" => "required",
            "pelicula_id" => "required",
            "fecha_devolucion" => "required|date",
        ]);
        $item = new Pedido();
        $item->cliente_id = $request->cliente_id;
        $item->pelicula_id = $request->pelicula_id;
        $item->fecha_devolucion = $request->fecha_devolucion;
        if ($request->observacion != "") {
            $item->observaciones = $request->observacion;
        }
        if($item->save()){
            return redirect('/pedidos')->with('success', 'El registro ha sido agregado correctamente.');
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
        $clientes = Cliente::where('estado', true)->get();
        $peliculas = Pelicula::where('estado', true)->get();
        $dato = Pedido::find($id);
        return view('pedidos.PedidoEditView', compact('dato', 'clientes', 'peliculas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "cliente_id" => "required",
            "pelicula_id" => "required",
            "fecha_devolucion" => "required|date",
        ]);
        $item = Pedido::find($id);
        $item->cliente_id = $request->cliente_id;
        $item->pelicula_id = $request->pelicula_id;
        $item->fecha_devolucion = $request->fecha_devolucion;
        if ($request->observacion != "") {
            $item->observaciones = $request->observacion;
        }
        if($item->save()){
            return redirect('/pedidos')->with('success', 'El registro ha sido modificado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo modificar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Pedido::find($id);
        if($item->delete()){
            return redirect('/pedidos')->with('success', 'El registro ha sido eliminado correctamente.');
        }else{
            return redirect()->back()->with('error', 'No se pudo eliminar el registro.');
        }
    }
}
