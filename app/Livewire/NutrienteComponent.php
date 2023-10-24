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
    public $perPage = 30;
    public bool $exibirModal = false;
    public $search = '';

    public function render()
    {
        $nutrientes = Nutriente::orderByDesc('id')
            ->where('user_id', auth()->id())
            ->where('nome', 'like', "%{$this->search}%")
            ->orWhere('tag', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
            $this->resetPage();
        return view('livewire.nutriente-component', ['nutrientes' => $nutrientes]);
    }

    public function setPerPage($value)
    {
        $this->perPage = $value;
        $this->resetPage();
    }

    public function save(): void
    {
        if ($this->validate($this->rules())) {
            Nutriente::query()->create([
                'nome' => $this->nome,
                'unidade' => $this->unidade,
                'tag' => $this->tag,
                'user_id' => auth()->id()
            ]);
            $this->nome = "";
            $this->unidade = "";
            $this->tag = "";
            $this->dispatch('fechar-modal');
        } else {
            $this->dispatch('exibir-modal');    
        }
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'max:50', new NomeNutriente],
            'unidade' => ['required', 'max:6'],
            'tag' => ['required', 'max:10'],
        ];
    }

    public function close()
    {
        $this->nome = "";
        $this->unidade = "";
        $this->tag = "";
    }
}
