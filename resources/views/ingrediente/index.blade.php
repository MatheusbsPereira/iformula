@extends('layouts.app')
@section('titulo', 'Ingredientes')
@section('content')
    <livewire:ingrediente_component />
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-ingredientes-view.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
