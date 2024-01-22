@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>
        <div id="armario"  data-route="{{ route('juego4.update', ['id' => $id]) }}">
            <Armario></Armario>

        </div>


    </body>

  @endsection
