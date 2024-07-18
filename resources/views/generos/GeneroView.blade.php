@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Registro de generos</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-8 mt-3">
                    <input type="search" class="form-control" placeholder="Bucar...">
                </div>
                <div class="col-12 col-md-4 mt-3 text-center">
                    <a href="{{ url('/generos/nuevo') }}" class="btn btn-primary">Agregar</a>
                </div>
                <div class="col-12 col-sm-12 mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>Item</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($datos) == 0)
                                    <tr class="table-danger">
                                        <td class="text-center text-danger" colspan="5">Ningun registro encontrado</td>
                                    </tr>
                                @else
                                    @foreach ($datos as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>
                                                @if ($item->estado)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/generos/'.$item->id) }}" class="btn btn-outline-warning btn-sm">⚠</a>
                                                    <form action="{{ url('/generos/'.$item->id) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if ($item->estado)
                                                            <button class="btn btn-outline-danger btn-sm">🚫</button>
                                                        @else
                                                            <button class="btn btn-outline-success btn-sm">✔</button>
                                                        @endif
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