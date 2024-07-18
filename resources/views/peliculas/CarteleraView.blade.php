@extends('layout.PlantillaPeliculas')
@section('contenido')
    <div class="row d-flex justify-content-center gy-4">
        @foreach ($datos as $item)
            <div class="col-12 col-md-4">
                <div class="card border border-0">
                    <img src="{{ $item->portada != '' ? $item->portada : 'https://images.vexels.com/media/users/3/215349/preview2/57096aedec2e3b2d1039f6388af44968-diseno-de-ilustracion-de-palomitas-de-maiz.jpg' }}"
                        width="100%" height="400px">
                    <div class="card-body ">
                        <h5 class="card-title">{{ $item->nombre }}</h5>
                        <p><i class="fa-solid fa-table-cells-column-lock me-1"></i><b>Genero: </b>
                            {{ $item->genero?->nombre }}
                        </p>
                        <p><i class="fa-regular fa-star me-1"></i>
                            <b>Calificacion: </b>
                            @for ($i = 0; $i < $item->calificacion; $i++)
                                ⭐
                            @endfor
                        </p>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <button type="button" class="btn btn-outline-primary">Comprar entrada<i class="fa-solid fa-ticket ms-2"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        {{$datos->links('pagination::bootstrap-5')}}
    </div>
@endsection
