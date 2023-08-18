@extends('layouts.app')
@section('titulo', "Ingrediente $ingrediente->nome")
@section('content')
    <table class="table table-striped">
        Ingrediente: {{ $ingrediente->nome }}
        <thead>
            <tr class="table-light">
                <th>Nutrientes:</th>
            </tr>
            <tr class="table-light">
                <th>Nome</th>
                <th>Valor</th>
                <th>Unidade</th>
            </tr>
        <tbody>
            @foreach ($ingrediente->nutrientes as $nutriente)
                <td>{{ $nutriente->nome }}</td>
                <td>{{ $nutriente->pivot->valor }}</td>
                <td>{{ $nutriente->unidade }}</td>
            @endforeach
        </tbody>
        </thead>
    </table>
@endsection
