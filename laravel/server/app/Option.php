<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','filier_id'
    ];
    public function filiere()
    {
        return $this->belongsTo(Filier::class);
    }
}
