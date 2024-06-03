<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;
    protected $fillable =[

        'id',
        'name'
    ];

    public function Appartements(){
        return $this->belongsToMany(Appartement::class ,'appartement_characteristics');
    }
}
