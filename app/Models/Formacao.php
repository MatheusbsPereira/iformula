<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;
    protected $table = "formacoes";
    protected $fillable = ['valor','nutriente_id','ingrediente_id'];
}