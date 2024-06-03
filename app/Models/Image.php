<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable =[

        'id',
        'appartement_id',
        'image',

    ];

    public function Appartemnt(){
        return $this->belongsTo(Appartement::class);
    }
}
