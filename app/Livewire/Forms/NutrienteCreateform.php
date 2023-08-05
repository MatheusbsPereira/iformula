<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NutrienteCreateform extends Form
{
    //
    #[Rule(['required','max:50'])]
    public ?string $nome;
    
    #[Rule(['required','max:6'])]
    public ?string $unidade;
}
