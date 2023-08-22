@extends('layouts.app')
@section('titulo', "Ingrediente $ingrediente->nome")
@section('content')
    <div class="container">
        <livewire:show_ingrdiente_component :ingrediente="$ingrediente" :key="'refresh-component-'.time()"/>
    </div>
@endsection
