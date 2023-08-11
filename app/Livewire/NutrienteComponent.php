<?php

namespace App\Livewire;

use App\Livewire\Forms\NutrienteCreateform;
use App\Models\Nutriente;
use Livewire\Component;
use Livewire\WithPagination;

class NutrienteComponent extends Component
{
    use WithPagination;
    public NutrienteCreateform $form;
    public function render()
    {
        return view('livewire.nutriente-component',['nutrientes'=>Nutriente::orderByDesc('id')->paginate(6)]);
    }
    public function save( ): void
    {
        $this->validate();
        Nutriente::query()->create($this->form->all());
        $this->form->reset();
    }
}
