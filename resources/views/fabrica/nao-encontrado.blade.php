
@extends('layouts.app')
@section('titulo','Fábricas')
@section('content')
<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   
                    <div class="card-body">
                        
                        <p>Fábrica não encontrada</p>
                        <p>Clique <a href="{{ route('fabrica.index') }}">aqui</a> para voltar</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    
