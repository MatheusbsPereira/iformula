<?php

namespace App\Livewire;

use App\Models\Ingrediente;
use App\Rules\NomeIngrediente;
use Livewire\Component;

class CrudIngredienteComponent extends Component
{
    public int $id;
    public string $nome;
    public string $tag;
    public string $descricao;
    public string $first_nome;
    public  $preco = '';
    public function render()
    {
        return view('livewire.crud-ingrediente-component');
    }
    public function mount($id)
    {
        $ingrediente = Ingrediente::find($id);
        $this->id = $ingrediente->id;
        $this->nome = $ingrediente->nome;
        $this->first_nome = $this->nome;
        $this->preco = $ingrediente->preco;
        $this->descricao = $ingrediente->descricao;
        $this->tag = $ingrediente->tag;
        $this->dispatch('etapaMudou');
    }
    public function save()
    {
        if ($this->nome != $this->first_nome) {
            $this->validate($this->rulesNewName(), $this->message());
        } else {
            $this->validate($this->rules(), $this->message());
        }
        $ingrediente = Ingrediente::find($this->id);
        $ingrediente->nome = $this->nome;
        $ingrediente->tag = $this->tag;
        $ingrediente->preco = $this->preco;
        $ingrediente->descricao = $this->descricao;
        $ingrediente->save();
        return redirect()->to(route('ingrediente.index'));
    }
    public function rulesNewName()
    {
        return [
            'nome' => ['required', 'max:50', new NomeIngrediente],
            'preco' => ['required', 'max:9999.99', 'numeric'],
            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
        ];
    }
    public function rules()
    {
        return [
            
            'nome' => ['required', 'max:50',],
            'preco' => ['required', 'max:9999.99', 'numeric'],
            'tag' => ['required', 'max:10'],
            'descricao' => ['max:70'],
        ];
    }
    public function message()
    {
        return [
            'preco.numeric' => 'Valor inválido',
        ];
    }
    public function excluir()
    {
        $ingrediente = Ingrediente::find($this->id);
        $ingrediente->delete();
        return redirect()->to(route('ingrediente.index'));
    }
    public function nutrientes()
    {
        $ingrediente = Ingrediente::find($this->id);
        return redirect()->to(route('ingrediente.show',['nome'=>$ingrediente->nome]));
    }
    public function close() {    
        $ingrediente = Ingrediente::find($this->id);
        $this->dispatch('close-modal');
        $this->resetErrorBag();
        $this->nome = $ingrediente->nome;
        $this->tag = $ingrediente->tag;
        $this->preco = $ingrediente->preco;
        $this->descricao = $ingrediente->descricao;
    }
}
