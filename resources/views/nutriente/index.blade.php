@extends('layouts.app')
@section('titulo', 'Nutrientes')
@section('content')
    <div class="card-body">
        <form action="{{ route('nutriente.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="nutriente" class="col-mb-2 col-form-label">Nutriente:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome">
                </div>
                @error('nome')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="unidade" class="col-mb-2 col-form-label">Unidade:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="unidade">
                </div>
                @error('unidade')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 row">
                <label for="unidade" class="col-mb-2 col-form-label">Tag:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tag">
                </div>
                @error('tag')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <livewire:nutriente_component />
@endsection
