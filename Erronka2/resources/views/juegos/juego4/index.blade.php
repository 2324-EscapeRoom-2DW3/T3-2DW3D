@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>

        <div id="juego4" data-route="{{ route('juego4.tutorial', ['id' => $id]) }}"
            data-routetutorial="{{ route('juego4.tutorialvalue', ['id' => $id]) }}"
            data-routetiempo="{{ route('juegocompleto.tiempo', ['id' => $id]) }}"
            data-routetiempoval="{{ route('juegocompleto.tiempo_val', ['id' => $id]) }}">
            <Juego4></Juego4>
        </div>

    </body>

@endsection
