@extends('layouts.app')
@section('titulo', "Ingrediente $animal->nome")
@section('content')
    <div class="container">
        <livewire:show_animal_component :animal="$animal" />
    </div>
@endsection
