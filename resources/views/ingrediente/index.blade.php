@extends('layouts.app')
@section('titulo','Ingredientes')
@section('content')
    <livewire:ingrediente_component />
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-ingredientes-view.css') }}"/>
@endsection

    