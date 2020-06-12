<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filier extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom'
    ];
    public function options()
    {
        return $this->hasMany(Option::class);
        
    }

    public function condidats()
    {
        return $this->belongsToMany(Condidat::class, 'condidat_filiere');
    }
}
