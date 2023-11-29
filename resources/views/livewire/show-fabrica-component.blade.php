<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div style="height: 100%;">
        <div style="display: flex;flex-direction: column;justify-content: space-between;">
            <x-my-modal name="cadastrar">
                <livewire:racao_modal :id=$id>
            </x-my-modal>
            <div class="container">
                <div class="title-container">
                    <div class="page-title">
                        <span class="title-painel">Painel da Fábrica</span>
                        <span class="subtitle-painel">{{ $fabrica->especie }}</span>
                    </div>
                </div>

                <div class="header-tools">
                    <div class="left-tools">
                        <button id="btnAddIng" class="btn-adicionar" wire:click='formular'>
                            <i class='bx bx-plus'></i> Formular
                        </button>
                        <div class="dropdown btn-adicionar">
                            <button class="dropdown-reset"><i class='bx bx-export'></i> Exportar</button>
                            <div class="dropdown-content">
                                <a href="#" {{-- wire:click="exportToPDF" --}}>PDF</a>
                                <a href="#{{-- route('ingrediente.exportsxlsx') --}}">Excel</a>
                            </div>
                        </div>
                    </div>

                    <div class="right-tools">
                        <input type="text" placeholder="Pesquisar" class="btn-pesquisar" wire:model.live='search'>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Ingredientes</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>
                                    <select class="form-select" wire:change="adicionar($event.target.value)">
                                        <option value="0">Adicionar</option>
                                        @foreach ($ingredientes as $ingrediente)
                                            @if (!in_array($ingrediente->id, $ingredientes_adicionados))
                                                <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                                            @endif
                                        @endforeach
                                        {{-- <select wire:change="adicionarRacao($event.target.value)">
                                        <option value="0">Adicionar</option>
                                        @foreach ($racoes as $racao)
                                            @if (!in_array($racao->id, $racoes_adicionadas))
                                                <option value="{{ $racao->id }}">{{ $racao->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select> --}}
                                </th>
                                <th><span>Máximo</span></th>
                                <th><span>Mínimo</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredientes as $ingrediente)
                                @if (in_array($ingrediente->id, $ingredientes_adicionados))
                                    <tr>
                                        <td>{{ $ingrediente->nome }}</td>
                                        <td><input type="text" maxlength="70"
                                                class="form-control @error("valoresmin.$ingrediente->id")erro @enderror text-center"
                                                wire:model="valoresmin.{{ $ingrediente->id }}"></td>
                                        <td><input type="text" maxlength="70"
                                                class="form-control @error("valoresmax.$ingrediente->id")erro @enderror text-center"
                                                wire:model="valoresmax.{{ $ingrediente->id }}"></td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

<!-- Tabela de Rações -->
<div class="col-12 col-sm-6">
    <table class="table table-responsive" style="min-width: 100%">
        <thead>
            <th>Rações</th>
            <tr>
                <!-- Adiciona caixa de seleção para adicionar rações -->
                @if ($racao_contagem <= 4)
                    <th>
                        <select wire:change="adicionarRacao($event.target.value)" class="form-select">
                            <option value="0">Selecione</option>
                            @foreach ($racoes as $racao)
                                @if (!in_array($racao->id, $racoes_adicionadas))
                                    <option value="{{ $racao->id }}">{{ $racao->nome }}</option>
                                @endif
                            @endforeach
                        </select>
                    </th>
                @else
                    <th>
                        <select disabled wire:change="adicionarRacao($event.target.value)" class="form-select">
                            <option value="0">Máximo</option>
                        </select>
                    </th>
                @endif
                <!-- Adiciona cabeçalhos para as rações -->
                @foreach ($racoes as $racao)
                    @if (in_array($racao->id, $racoes_adicionadas))
                        <th>{{ $racao->nome }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredientes as $ingrediente)
                @if (in_array($ingrediente->id, $ingredientes_adicionados))
                    <tr>
                        <td>{{ $ingrediente->nome }}</td>
                        <!-- Adiciona células para os valores associados -->
                        @foreach ($racoes as $racao)
                            @if (in_array($racao->id, $racoes_adicionadas))
                                <td>
                                    @if (isset($valoresAssociados[$ingrediente->id][$racao->id]))
                                        {{ $valoresAssociados[$ingrediente->id][$racao->id] }}
                                    @else
                                        0 <!-- Adicione esta linha para exibir 0 se o valor não estiver definido -->
                                    @endif
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>



            </div>
        </div>
    </div>
    <style>
        th p {
            margin: 0
        }

        .form-select {
            width: auto !important;
        }
    </style>
</div>
