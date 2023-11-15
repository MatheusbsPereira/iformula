@extends('layouts.app')
@section('titulo', "Fabrica $fabrica->especie")
@section('content')
    <div class="container">
        <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
        <livewire:show_fabrica_component :fabrica="$fabrica" />
    </div>
@endsection
