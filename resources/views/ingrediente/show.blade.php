@extends('layouts.app')
@section('titulo', "Ingrediente $ingrediente->nome")
@section('content')
    <div class="container">
        <livewire:show_ingrediente_component :ingrediente="$ingrediente" />
    </div>
@endsection
