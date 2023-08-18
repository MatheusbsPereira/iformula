<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class IngredienteCreateform extends Form
{
    //
    #[Rule(['required','max:50'])]
    public string $nome = '';
    
    #[Rule(['required','max:9999.99','numeric'])]
    public  $preco = '';
    public $nutrientes = [];
    
}
