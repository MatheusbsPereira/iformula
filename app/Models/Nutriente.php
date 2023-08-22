<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutriente extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class,'formacoes')->withPivot('valor','id');
    }
}
