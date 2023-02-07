@extends('layout')

@section('heading', $recipe['title'])

@section('content')
<div class="container">
    <h1>Culinary Arts DB - {{$heading}}</h1>
    <h2>{{$recipe['id']}} - {{$recipe['title']}}</h2>
    <p>{{$recipe['description']}}</p>
</div>
@endsection