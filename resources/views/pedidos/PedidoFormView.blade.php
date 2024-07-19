@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Nuevo registro</h5>
        </div>
        <form action="{{ url('/pedidos') }}" method="post">
            @csrf
            <div class="card-body">
                @include('includes.alerts')
                <div class="row gy-3">
                    <div class="col-12 col-md-6">
                        <label for="cliente_id" class="label-form fw-bold">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre.' '.$item->apellido }}</option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <small class="text-danger">
                                {{ $errors->first('cliente_id') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="pelicula_id" class="label-form fw-bold">Pelicula</label>
                        <select name="pelicula_id" id="pelicula_id" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($peliculas as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre.' - '.$item->genero?->nombre }}</option>
                            @endforeach
                        </select>
                        @error('pelicula_id')
                            <small class="text-danger">
                                {{ $errors->first('pelicula_id') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="fecha_devolucion" class="label-form fw-bold">Fecha devolucion</label>
                        <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" placeholder="Escriba..."
                            value="{{ old('fecha_devolucion') }}">
                        @error('fecha_devolucion')
                            <small class="text-danger">
                                {{ $errors->first('fecha_devolucion') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="observacion" class="label-form fw-bold">Observacion</label>
                        <textarea name="observacion" id="observacion" class="form-control">{{ old('observacion') }}</textarea>
                        @error('observacion')
                            <small class="text-danger">
                                {{ $errors->first('observacion') }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/pedidos') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
