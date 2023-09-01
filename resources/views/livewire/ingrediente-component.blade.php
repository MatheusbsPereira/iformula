<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3 row">
                    <label for="nome" class="col-mb-2 col-form-label">Ingrediente:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="nome">
                    </div>
                    @error('nome')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="preco" class="col-mb-2 col-form-label">Preço:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="preco">
                    </div>
                    @error('preco')
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
                                <label for="">Valor :</label>
                                <input type="text" wire:model="valores.{{ $nutriente['id'] }}">
                                <label for="">{{ $nutriente['unidade'] }}</label>
                                @error("valores.$nutriente[id]")
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
            @foreach ($ingredientes as $key =>$ingrediente)
                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <p>Nome: <a href="{{ route('ingrediente.show', ['ingrediente' => $ingrediente->id]) }}">{{$ingrediente['nome']}}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        {{$ingredientes->links()}}
    </div>
</div>
