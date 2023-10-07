@extends('layouts.app')
@section('titulo','Animais')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    
                    <p>Animal não encontrado</p>
                    <p>Clique <a href="{{ route('animal.index') }}">aqui</a> para voltar</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    