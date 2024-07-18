@extends('layout.plantilla')
@section('contenido')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Editar registro</h5>
        </div>
        <form action="{{ url('/libros/'.$item->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-12 col-md-6">
                        <label for="nombre" class="label-form">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba..." value="{{ old('nombre', $item->nombre) }}">
                        @error('nombre')
                            <small class="text-danger">
                                {{ $errors->first('nombre') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="codigo" class="label-form">Codigo</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Escriba..." value="{{ old('codigo', $item->codigo) }}">
                        @error('codigo')
                            <small class="text-danger">
                                {{ $errors->first('codigo') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="cantidad" class="label-form">Cantidad</label>
                        <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Escriba..." value="{{ old('cantidad', $item->cantidad) }}">
                        @error('cantidad')
                            <small class="text-danger">
                                {{ $errors->first('cantidad') }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="precio_compra" class="label-form">Precio <small
                                class="text-danger">(Compra)</small></label>
                        <input type="text" name="precio_compra" id="precio_compra" class="form-control" placeholder="Escriba..." value="{{ old('precio_compra', $item->precio_compra) }}">
                        @error('precio_compra')
                            <small class="text-danger">
                                {{ $errors->first('precio_compra') }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/libros') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
