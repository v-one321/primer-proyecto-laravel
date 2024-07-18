@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Nuevo registro</h5>
        </div>
        <form action="{{ url('/generos') }}" method="post">
            @csrf
            <div class="card-body">
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
                        <label for="descripcion" class="label-form fw-bold">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <small class="text-danger">
                                {{ $errors->first('descripcion') }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/generos') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
