<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulacao extends Model
{
    use HasFactory;
    protected $table = 'formulacoes';
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class,'ingredientes_de_formulacoes')->withPivot('peso','id');
    }
    public function racao()
    {
        return $this->belongsTo(Racao::class,'racao_id');
    }
}
