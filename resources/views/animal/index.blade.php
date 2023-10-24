@extends('layouts.app')
@section('titulo','Animais')
@section('content')
    <livewire:animal_component />
@endsection
@section('scriptcss')
    <link rel="stylesheet" href="{{ asset('css/style-animais-view.css') }}"/>
@endsection
