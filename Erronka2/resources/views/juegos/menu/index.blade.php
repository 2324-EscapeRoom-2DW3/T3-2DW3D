@extends('layout.plantilla')

@section('title', 'Juego1')

@section('content')

    <body>

        <div id="menujuego"   data-routetiempo="{{ route('juegocompleto.tiempo', ['id' => $id]) }}"
            data-routetiempoval="{{ route('juegocompleto.tiempo_val', ['id' => $id]) }}">
        </div>





    </body>

@endsection
