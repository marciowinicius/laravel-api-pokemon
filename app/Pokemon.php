<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    /** Fillable de Pokemon
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'type', 'attack', 'defense', 'agility'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**Tabela de referencia
     * @var string
     */
    public $table = "pokemons";

    /**Relacionamento com user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function user()
    {
        return $this->belongsTo('App\User');
    }
}
