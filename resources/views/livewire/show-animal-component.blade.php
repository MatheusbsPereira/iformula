<div>
    <div class="row justify-content-center">
        <table class="table table-striped">
            Animal: {{ $animal->nome }}
            <thead>
                <tr class="table-light">
                    <th>Nutrientes:</th>
                </tr>
                <tr class="table-light">
                    <th>Nome</th>
                    <th>Valor Mínimo</th>
                    <th>Valor Maximo</th>
                    <th>Unidade</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            <tbody>
                @foreach ($animal->nutrientes as $nutriente)
                    <tr class="table-light">
                        <td>{{ $nutriente->nome }}</td>
                        @if ($editarforms[$nutriente->pivot->id])
                            <td>
                                <form action="">
                                    <input type="text" wire:model='valoreseditarmin.{{ $nutriente->pivot->id }}'>
                                </form>
                            </td>
                            <td>
                                <form action="">
                                    <input type="text" wire:model='valoreseditarmax.{{ $nutriente->pivot->id }}'>
                                </form>
                            </td>
                        @else
                            <td>{{ $nutriente->pivot->valormin }}</td>
                            <td>{{ $nutriente->pivot->valormax }}</td>
                        @endif
                        <td>{{ $nutriente->unidade }}</td>
                        <td> <button wire:click="deletarNutrienter({{ $nutriente->pivot->id }})"
                                class="btn btn-danger">Remover
                            </button>
                        </td>
                        @if ($editarforms[$nutriente->pivot->id] == false)
                            <td> <button wire:click="editarValor({{ $nutriente->pivot->id }})"
                                    class="btn btn-primary">Editar</button> </td>
                        @else
                            <td> <button wire:click="atualizarValor({{ $nutriente->pivot->id }})"
                                    class="btn btn-success">Salvar</button>

                            </td>
                            <td>
                                @php
                                    $valorId = $nutriente->pivot->id;
                                @endphp
                                @error("valoreseditar.$valorId")
                                    {{ $message }}
                                @enderror
                            </td>
                        @endif


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
                        <label for="">Valor Minímo:</label>
                        <input type="text" wire:model='valoresmin.{{ $nutriente->id }}' class=""><br>
                        @error("valoresmin.$nutriente->id")
                            {{ $message }}
                        @enderror
                        <label for="">Valor Maxímo:</label>
                        <input type="text" wire:model='valoresmax.{{ $nutriente->id }}' class=""><br>
                        @error("valoresmax.$nutriente->id")
                            {{ $message }}
                        @enderror
                        <button type="submit" class="btn btn-success">Adicionar</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>

</div>
