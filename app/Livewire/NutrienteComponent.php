<?php

namespace App\Livewire;

use App\Models\Nutriente;
use App\Rules\NomeNutriente;
use Livewire\Component;
use Livewire\WithPagination;

class NutrienteComponent extends Component
{
    use WithPagination;

    
    public string $name = 'cadastrar';
    
    public $perPage = 30;
    public bool $exibirModal = false;
    public $search = '';

    public function render()
    {
        $nutrientes = Nutriente::orderByDesc('id')
        ->where(function ($query) {
            $query->where('user_id', auth()->id())
                ->where(function ($subquery) {
                    $subquery->where('nome', 'like', "%{$this->search}%")
                        ->orWhere('tag', 'like', "%{$this->search}%");
                });
        })
        ->paginate($this->perPage);
        $this->resetPage();
        return view('livewire.nutriente-component', ['nutrientes' => $nutrientes]);
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
    }

    protected $listeners = ['nutrienteExcluido' => 'atualizarListaNutrientes', 'close-modal' => 'resetar'];

    public function atualizarListaNutrientes()
    {
        Nutriente::orderBy('id')
            ->where('user_id', auth()->id())
            ->paginate($this->perPage);
    }

    
}
