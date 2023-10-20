<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="nome" class="col-mb-2 col-form-label">Animal:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="nome">
                    </div>
                    @error('nome')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="descricao" class="col-mb-2 col-form-label">Descrição:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="descricao">
                    </div>
                    @error('descricao')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="tag" class="col-mb-2 col-form-label">Tag:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="tag">
                    </div>
                    @error('tag')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="nutrientes" class="col-mb-2 col-form-label">Nutrientes:</label>
                    <div class="col-sm-10">
                        @foreach ($nutrientes_escolher as $key => $nutriente)
                            <p>
                                <input type="checkbox" value="{{ $nutriente['id'] }}" wire:model="nutrientes">
                                <label for="">{{ $nutriente['nome'] }} |</label>
                                <label for="">Valor Minimo:</label>
                                <input type="text" wire:model="valoresmin.{{ $nutriente['id'] }}">
                                <label for="">{{ $nutriente['unidade'] }}</label>
                                @error("valoresmin.$nutriente[id]")
                                    {{ $message }}
                                @enderror
                                <label for="">Valor Maximo:</label>
                                <input type="text" wire:model="valoresmax.{{ $nutriente['id'] }}">
                                <label for="">{{ $nutriente['unidade'] }}</label>
                                @error("valoresmax.$nutriente[id]")
                                    {{ $message }}
                                @enderror
                            </p>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            @foreach ($animais as $key =>$animal)
                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <p>Nome: <a href="{{ route('animal.show', ['nome' => $animal->nome]) }}">{{$animal['nome']}}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        {{$animais->links()}}
    </div>
</div>
