<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/fluid-canvas@latest"></script>
    <title>Document</title>
    @vite('resources/js/fluid.min.js')

    @vite(['resources/css/app.css'])
</head>

<body>
    @include('partials.header')

    {{--     <div id="app"></div>
 --}} @vite('resources/js/app.js')
    @include('partials.footer')

</body>

</html>
