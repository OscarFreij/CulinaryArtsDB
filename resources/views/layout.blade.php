<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Culinary Arts DB - @yield('heading',$heading)</title>
</head>
<body>
    <h1 class="text-3xl font-bold underline">Culinary Arts DB - {{$heading}}</h1>
    @yield('content')
</body>
</html>