<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racao extends Model
{
    use HasFactory;
    protected $table = "racoes";
    protected $guarded = [];
    public function nutrientes()
    {
        return $this->belongsToMany(Nutriente::class, 'exigencias')->withPivot('valormin','valormax', 'id');
    }
    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }
    public function formulacao(){
        return $this->hasOne(Formulacao::class);
    }
}
