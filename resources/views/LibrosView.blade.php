@extends('layout.plantilla')
@section('contenido')
    <div class="card">
        <div class="card-header bg-warning-subtle">
            <h1>Registro de libros</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row gy-3">
                <div class="col-12 col-md-6 text-center">
                    <a href="{{ url("libros/nuevo") }}" class="btn btn-primary">Agregar</a>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-warning">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Editorial</th>
                                    <th>Codigo</th>
                                    <th>Cantidad</th>
                                    <th>Precio <small class="text-danger">(Compra)</small></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->editorial123?->nombre }}</td>
                                        <td>{{ $item->codigo }}</td>
                                        <td>{{ $item->cantidad }}</td>
                                        <td>{{ $item->precio_compra }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('/libros/'.$item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                                
                                                <a href="{{ url('/libros/eliminar/'.$item->id) }}" class="btn btn-danger btn-sm">Eliminar</a>

                                                <form action="{{ url('/libros/'.$item->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-sm">Eliminar form</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $datos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
