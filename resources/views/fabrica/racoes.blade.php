@extends('layouts.app')
@section('titulo', "Fábrica $fabrica->especie")
@section('content')
    <div class="container">
        <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
        <livewire:show_fabrica_racoes_component :fabrica="$fabrica" />
    </div>
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-fabricas-view.css') }}"/>
@endsection<div>
    

