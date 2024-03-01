@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>

        <div id="juego6" data-routetiempo="{{ route('juegocompleto.tiempo', ['id' => $id]) }}"
            data-routetiempoval="{{ route('juegocompleto.tiempo_val', ['id' => $id]) }}">
            <Juego6></Juego6>
        </div>

    </body>

@endsection
