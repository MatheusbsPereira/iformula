@extends('layouts.app')
@section('titulo','Nutrientes')
@section('content')
    <livewire:nutriente_component />
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-nutrientes.css') }}"/>
@endsection

    