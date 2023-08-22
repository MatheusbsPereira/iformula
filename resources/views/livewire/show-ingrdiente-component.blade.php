<div>
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
    <div class="row justify-content-center">
        @foreach ($nutrientes_adicionar as $nutriente)
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <p>Nutriente: {{ $nutriente->nome }}</p>
                    <form action="" wire:submit="adicionarNutriente({{ $nutriente->id }})">
                        <label for="">Valor :</label>
                        <input type="text" wire:model='valores.{{ $nutriente->id }}'><br>
                        @error("valores.$nutriente->id")
                            {{ $message }}
                        @enderror
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
</div>
