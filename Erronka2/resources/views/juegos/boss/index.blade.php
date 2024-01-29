@extends('layout.plantilla2')

@section('title', 'Juego1')

@section('content')


    <body>
        <div id="boss">
            <Boss  :id="{{ $id }}"></Boss>

        </div>


    </body>

  @endsection
