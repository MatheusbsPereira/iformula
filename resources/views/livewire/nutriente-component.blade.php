<div class="">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container text-center">
        <div class="row">
            @foreach ($nutrientes as $key =>$nutriente)
                <div class="card">
                    <div class="card-body">
                        <p>{{$nutriente['nome']}}</p>
                        <p>{{$nutriente['unidade']}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="nutriente" class="col-mb-2 col-form-label">Nutriente:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="form.nome">
                    </div>
                    @error('form.nome')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="unidade" class="col-mb-2 col-form-label">Unidade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="form.unidade">
                    </div>
                    @error('form.unidade')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    
</div>
