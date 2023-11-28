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
                        <span class="title-painel">Painel de Controle</span>
                        <span class="subtitle-painel">Fábrica {{ $fabrica->especie }}</span>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="header-tools">
                    <div class="left-tools">
                        <button id="btnAddIng" class="btn-adicionar" x-data
                            x-on:click="$dispatch('open-modal',{name : 'cadastrar'})">
                            <i class='bx bx-plus'></i> Adicionar
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

            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Rações</th>
                            <th></th>
                            <th></th>
                            <th>
                                @if ($racao_contagem>0 && $ingredientes_adicionados)
                                    <button class="btn-adicionar" wire:click='formular'>Formular</button>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th>Ingredientes</th>
                            <th>
                                @if ($racao_contagem >= 5)
                                    Limite atingido
                                @else
                                    <select wire:change="adicionarRacao($event.target.value)">
                                        <option value="0">Adicionar</option>
                                        @foreach ($racoes as $racao)
                                            @if (!in_array($racao->id, $racoes_adicionadas))
                                                <option value="{{ $racao->id }}">{{ $racao->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif

                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th><select wire:change="adicionar($event.target.value)">
                                    <option value="0">Adicionar</option>
                                    @foreach ($ingredientes as $ingrediente)
                                        @if (!in_array($ingrediente->id, $ingredientes_adicionados))
                                            <option value="{{ $ingrediente->id }}">{{ $ingrediente->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                            <th>Valor mínimo</th>
                            <th>Valor máximo</th>
                            @foreach ($racoes as $racao)
                                @if (in_array($racao->id, $racoes_adicionadas))
                                    <th> {{ $racao->nome }}</th>
                                @endif
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingredientes as $ingrediente)
                            @if (in_array($ingrediente->id, $ingredientes_adicionados))
                                <tr>
                                    <td>{{ $ingrediente->nome }}</td>
                                    <td><input type="text" maxlength="70"
                                        class="form-control @error("valoresmin.$ingrediente->id")erro @enderror text-center" wire:model="valoresmin.{{$ingrediente->id}}"></td>
                                    <td><input type="text" maxlength="70"
                                        class="form-control @error("valoresmax.$ingrediente->id")erro @enderror text-center" wire:model="valoresmax.{{$ingrediente->id}}"></td>
                                    
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- $fabricas->links() --}}
        </div>
    </div>
</div>
