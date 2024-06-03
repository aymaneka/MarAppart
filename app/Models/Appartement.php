<?php

namespace App\Models;
use App\Enums\AppartementStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
  



    use HasFactory;
    
    protected $fillable =[
      'id',
      'user_id',
      'person_nombre',
      'name',
      'address',
      'city_id',
      'description',
      'space',
      'caracteristique_id',
      'no_chambre',
      'prix',
      'date',
    ];

   
    // protected $casts = [
    //   'status' => AppartementStatus::class
    //   ];
    

    public function characteristics(){
      return $this->belongsToMany(Characteristic::class,'appartement_characteristics');
    }
    public function images(){
      return $this->hasMany(Image::class);
    }
    public function reservations(){
           return $this->hasMany(Reservation::class);
    }
    public function city(){
      return $this->belongsTo(Citie::class);
    }

    public function user(){
      return $this->hasMany(User::class);
  }
}
