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
                </select>
                <button type="submit">Criar</button>
            </form>
        </div>
    </div>
</div>
