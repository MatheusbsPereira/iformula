@extends('layouts.app')
@section('titulo', "Fábrica $fabrica->especie")
@section('content')
    <div class="container">
        <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
        <livewire:show_fabrica_component :fabrica="$fabrica" />
    </div>
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-fabricas-view.css') }}"/>
@endsection