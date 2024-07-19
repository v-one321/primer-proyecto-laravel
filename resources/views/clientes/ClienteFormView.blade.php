@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            <h5 class="card-title">Nuevo registro</h5>
        </div>
        <form action="{{ url('/clientes') }}" method="post">
            @csrf
            <div class="card-body">
                @include('includes.alerts')
                <div class="row gy-3">
                    <div class="col-12 col-md-4">
                        <label for="nombre" class="label-form fw-bold">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba..."
                            value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger">
                                {{ $errors->first('nombre') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="apellido" class="label-form fw-bold">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Escriba..."
                            value="{{ old('apellido') }}">
                        @error('apellido')
                            <small class="text-danger">
                                {{ $errors->first('apellido') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="contacto" class="label-form fw-bold">Contacto</label>
                        <input type="text" name="contacto" id="contacto" class="form-control" placeholder="Escriba..."
                            value="{{ old('contacto') }}">
                        @error('contacto')
                            <small class="text-danger">
                                {{ $errors->first('contacto') }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/clientes') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
