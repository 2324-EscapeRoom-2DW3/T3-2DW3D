@extends('layout.plantilla2')

@section('title', 'AdminPage')

@section('content')



<body>

    @include('partials.header')

<div>
    <h1>ONGI ETORRI {{ Auth::user()->name }}</h1>
</div>

@include('partials.footer')
</body>

@endsection
