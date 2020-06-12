<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condidat extends Model
{
   


    protected $fillable = ['cin','cne','tele','nom','prenom','sexe',
    'date_du_bac','filiere_du_bac','date_de_naissance','lieu_de_naissance',
    'pays','region','province','adress',
    'image','filier_id_1','filier_id_2','email','password','accept'];
    
    
}
