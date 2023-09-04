@extends('layouts.app')
@section('titulo','Ingredientes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    
                    <p>Ingrediente não encontrado</p>
                    <p>Clique <a href="{{ route('ingrediente.index') }}">aqui</a> para voltar</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    