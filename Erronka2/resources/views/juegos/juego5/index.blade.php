@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>
        <div id="juego5"  data-route="{{ route('juego5.keyvalue', ['id' => $id]) }}">
            <Juego5></Juego5>

        </div>


    </body>

  @endsection
