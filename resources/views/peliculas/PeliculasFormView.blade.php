@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Nuevo registro</h5>
        </div>
        <form action="{{ url('/peliculas') }}" method="post">
            @csrf
            <div class="card-body">
                @include('includes.alerts')
                <div class="row gy-3">
                    <div class="col-12 col-md-6">
                        <label for="nombre" class="label-form fw-bold">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba..."
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger">
                                {{ $errors->first('nombre') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="portada" class="label-form fw-bold">Portada</label>
                        <textarea name="portada" id="portada" class="form-control">{{ old('portada') }}</textarea>
                        @error('portada')
                            <small class="text-danger">
                                {{ $errors->first('portada') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="calificacion" class="label-form fw-bold">Calificacion</label>
                        <select name="calificacion" id="calificacion" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @error('calificacion')
                            <small class="text-danger">
                                {{ $errors->first('calificacion') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="genero_id" class="label-form fw-bold">Genero</label>
                        <select name="genero_id" id="genero_id" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($generos as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('genero_id')
                            <small class="text-danger">
                                {{ $errors->first('genero_id') }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/peliculas') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
