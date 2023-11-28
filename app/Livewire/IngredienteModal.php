<?php

namespace App\Livewire;

use App\Models\Nutriente;
use Livewire\Component;
use App\Rules\NomeIngrediente;
use Jenssegers\Agent\Agent;

class IngredienteModal extends Component
{
    public string $nome;
    public string $tag;
    public string $descricao;
    public $preco = '';
    public int $etapa = 1;
    public $search = '';
    public $isMobile;

    // Inicialize as regras no método rules()
    protected function rules()
    {
        return [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99','regex:/^\d{1,3}(\.\d{3})*(\,\d{2})?$/'],

            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
        ];
    }

    protected $messages = [
        'preco.numeric' => 'Valor inválido',
    ];

    public function mount()
    {
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
    }

    public function render()
    {
        $nutrientes = Nutriente::orderByDesc('id')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())->where('nome', 'like', "{$this->search}%");
            })->get();
        return view('livewire.ingrediente-modal', ['nutrientes' => $nutrientes]);
    }

    public function close()
    {
        $this->nome = '';
        $this->tag = '';
        $this->preco = '';
        $this->descricao = '';
        $this->etapa = 1;
        $this->dispatch('close-modal');
        $this->resetErrorBag();
    }

    public function anterior()
    {
        $this->etapa -= 1;
    }

    public function voltarTudo()
    {
        $this->etapa = 1;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function primeiraEtapa()
    {
        $this->validate();

        // Se a validação for bem-sucedida, avança para a próxima etapa
        $this->etapa = 2;
    }
    public function segundaEtapa()
    {
        $this->primeiraEtapa();
    }
}
