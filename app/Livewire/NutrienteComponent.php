<?php

namespace App\Livewire;

use App\Livewire\Forms\NutrienteCreateform;
use App\Models\Nutriente;
use Livewire\Component;

class NutrienteComponent extends Component
{
    public NutrienteCreateform $form;
    public function render()
    {
        $nutrientes = Nutriente::get();
        return view('livewire.nutriente-component',['nutrientes'=>$nutrientes]);
    }
    public function save( ): void
    {
        $this->validate();
        Nutriente::query()->create($this->form->all());
        $this->form->reset();
    }
}
