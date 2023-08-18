@extends('layouts.app')
@section('titulo', "Ingrediente $ingrediente->nome")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
                        <tr class="table-light">
                            <td>{{ $nutriente->nome }}</td>
                            <td>{{ $nutriente->pivot->valor }}</td>
                            <td>{{ $nutriente->unidade }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>
@endsection
