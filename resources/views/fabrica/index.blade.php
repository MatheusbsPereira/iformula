@extends('layouts.app')
@section('titulo', 'Fabricas')
@section('content')
    <div>
        <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
        <livewire:fabrica_component />
    </div>
@endsection
@section('scriptcss')
<link rel="stylesheet" href="{{ asset('css/style-fabricas-view.css') }}"/>
@endsection
