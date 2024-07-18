@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Registro de peliculas</h5>
        </div>
        <div class="card-body">
            @include('includes.alerts')
            <div class="row">
                <div class="col-12 col-md-8 mt-3">
                    <input type="search" class="form-control" placeholder="Bucar...">
                </div>
                <div class="col-12 col-md-4 mt-3 text-center">
                    <a href="{{ url('/peliculas/nuevo') }}" class="btn btn-primary">Agregar</a>
                </div>
                <div class="col-12 col-sm-12 mt-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>Item</th>
                                    <th>Portada</th>
                                    <th>Nombre</th>
                                    <th>Genero</th>
                                    <th>Calificacion</th>
                                    <th>Estado</th>
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
                                            <td><img src="{{ $item->portada }}" width="100px" height="100px" alt="{{ $item->nombre }}"></td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->genero?->nombre }}</td>
                                            <td>
                                                @for ($i=0; $i<$item->calificacion; $i++)
                                                ⭐
                                                @endfor
                                            </td>
                                            <td>
                                                @if ($item->estado)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('/peliculas/'.$item->id) }}" class="btn btn-outline-warning btn-sm">⚠</a>
                                                    <form action="{{ url('/peliculas/'.$item->id) }}" method="post">
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