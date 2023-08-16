<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="nome" class="col-mb-2 col-form-label">Ingrediente:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="form.nome">
                    </div>
                    @error('form.nome')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="unidade" class="col-mb-2 col-form-label">Preço:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="form.preco">
                    </div>
                    @error('form.preco')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="nutrientes" class="col-mb-2 col-form-label">Nutrientes:</label>
                    <div class="col-sm-10">
                        @foreach ($nutrientes as $key => $nutriente)
                            <p>
                                <input type="checkbox" value="{{ $nutriente['id'] }}" wire:model="form.nutrientes">
                                <label for="">{{ $nutriente['nome'] }} |</label>  
                                <label for="">Valor :</label>
                                <input type="text" wire:model="valores.{{$nutriente['id']}}">
                                <label for="">{{$nutriente['unidade']}}</label>
                            </p>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
