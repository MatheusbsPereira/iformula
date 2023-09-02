<?php

namespace App\Livewire;


use App\Models\Nutriente;
use App\Rules\NomeNutriente;
use Livewire\Component;
use Livewire\WithPagination;

class NutrienteComponent extends Component
{
    use WithPagination;

    public string $nome = '';
    
    public string $unidade = '';
    public string $tag = '';
    public int $id_nutriente_exibir;
    public $perPage = 30;
    public bool $exibirModal = false;
    public function render()
    {
        $nutrientes = Nutriente::orderBy('id')
            ->where('user_id', auth()->id())
            ->paginate($this->perPage);

        return view('livewire.nutriente-component', ['nutrientes' => $nutrientes]);
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
    }

    
    
    
    
}
