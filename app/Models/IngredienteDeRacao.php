<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredienteDeRacao extends Model
{
    use HasFactory;
    protected $table = "ingediente_de_racoes";
    protected $guarded = [];
}
