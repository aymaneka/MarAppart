<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'appartement_id',
        'user_id',
        'status',
        'date_debut',
        'date_fin',

    ];



    public function appartement(){
        return $this->belongsTo(appartement::class);
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }
}