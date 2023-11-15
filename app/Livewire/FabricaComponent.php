<?php

namespace App\Livewire;

use App\Models\Fabrica;
use Livewire\Component;
use Livewire\WithPagination;

class FabricaComponent extends Component
{
    use WithPagination;
    public string $name = 'cadastrar';
    public $search = '';
    public bool $exibirModal = false;
    public $perPage = 30;
    public function render()
    {
        $fabricas = Fabrica::orderByDesc('id')->where(function ($query) {
            $query->where('user_id', auth()->id())
                ->where('especie', 'like', "%{$this->search}%");
        })
        ->paginate($this->perPage);
        return view('livewire.fabrica-component',['fabricas'=>$fabricas]);
    }
    public function setPerPage($value)
    {
        $this->perPage = $value;
    }
}
