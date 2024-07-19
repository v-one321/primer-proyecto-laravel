@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Registro de pedidos</h5>
        </div>
        <div class="card-body">
            @include('includes.alerts')
            <div class="row">
                <div class="col-12 col-md-8 mt-3">
                    <input type="search" class="form-control" placeholder="Bucar...">
                </div>
                <div class="col-12 col-md-4 mt-3 text-center">
                    <a href="{{ url('/pedidos/nuevo') }}" class="btn btn-primary">Agregar</a>
                </div>
                <div class="col-12 col-sm-12 mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>Item</th>
                                    <th>Nombre <small class="text-danger">(Cliente)</small></th>
                                    <th>Contacto <small class="text-danger">(Cliente)</small></th>
                                    <th>Nombre <small class="text-danger">(Pelicula)</small></th>
                                    <th>Genero <small class="text-danger">(Pelicula)</small></th>
                                    <th>Observacion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($datos) == 0)
                                    <tr class="table-danger">
                                        <td class="text-center text-danger" colspan="7">Ningun registro encontrado</td>
                                    </tr>
                                @else
                                    @foreach ($datos as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->cliente?->nombre.' '.$item->cliente?->apellido }}</td>
                                            <td>{{ $item->cliente?->contacto }}</td>
                                            <td>{{ $item->pelicula?->nombre }}</td>
                                            <td>{{ $item->pelicula?->genero?->nombre }}</td>
                                            <td>{{ $item->observaciones }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/pedidos/'.$item->id) }}" class="btn btn-outline-warning btn-sm">⚠</a>
                                                    <form action="{{ url('/pedidos/'.$item->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-outline-danger btn-sm">🚫</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $datos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection