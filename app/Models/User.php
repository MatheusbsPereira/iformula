<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function exigencias()
    {
        return $this->hasMany(Exigencia::class);
    }
    public function fabricas()
    {
        return $this->hasMany(Fabrica::class);
    }
    public function formacoes()
    {
        return $this->hasMany(Formacao::class);
    }
    public function formulacoes()
    {
        return $this->hasMany(Formulacao::class);
    }
    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class);
    }
    public function nutrientes()
    {
        return $this->hasMany(Nutriente::class);
    }
    public function racoes()
    {
        return $this->hasMany(Racao::class);
    }
}
