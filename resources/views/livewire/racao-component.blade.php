<div>
    {{-- Be like water. --}}
    <div class="Card">
         
        <div class="Card">
            <input type="number" wire:model="animal">
            <form wire:submit.prevent="save">
                <select wire:model="animal">
                    @foreach ($animais as $animal)
                        <option value="{{ $animal->id }}">{{ $animal->nome }}</option>
                    @endforeach
                    <option value="2">2</option>
                </select>
                <button type="submit">Criar</button>
            </form>
        </div>
    </div>
    <div>
    
        @if($melhorMistura)
            <div>
                <h3>Melhor mistura de ingredientes:</h3>
                @foreach($melhorMistura as $item)
                    <p>Quantidade de Ingrediente {{ $item['ingrediente'] }}: {{ $item['quantidade'] }}%</p>
                @endforeach
                <p>Custo total: R$ {{ $custoTotal }}</p>
            </div>
        @endif
    </div>
    
</div>
