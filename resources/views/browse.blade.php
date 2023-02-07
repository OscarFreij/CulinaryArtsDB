@extends('layout')

@section('content')
    @if (count($recipes) == 0)
    <p>No recipes found</p>              
    @else
    <div class="container columns-xs gap-8 mx-auto">
        @foreach ($recipes as $recipe)
            <h2>
                <a class="text-slate hover:text-sky-400 group transition duration-300" href="/recipe/{{$recipe['id']}}">
                    {{$recipe['title']}}
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-sky-600"></span>
                </a>
            </h2>
        @endforeach
    </div>
    @endif
@endsection