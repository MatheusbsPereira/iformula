<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredienteDeRacao extends Model
{
    use HasFactory;
    protected $table = "ingredientes_de_formulacoes";
    protected $guarded = [];
}
