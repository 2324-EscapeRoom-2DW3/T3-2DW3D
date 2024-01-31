@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')

<body style="overflow: hidden;">
    {{-- <script src="..\..\resources\js\juego2.js"></script> --}}

    <div id="juego2"     data-routetiempo="{{ route('juegocompleto.tiempo', ['id' => $id]) }}"
        data-routetiempoval="{{ route('juegocompleto.tiempo_val', ['id' => $id]) }}">
    </div>
</body>

@endsection





