@extends('layout')

@section('content')
<div class="container">
    <p>Welcome to the landingpage</p>

    <ul>
        <li>
            <a class="text-slate hover:text-sky-400 group transition duration-300" href="/browse">
                Browse Recipes
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-0.5 bg-sky-600"></span>
            </a>
        </li>
    </ul>
</div>
@endsection