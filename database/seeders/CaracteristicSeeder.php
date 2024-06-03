<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Characteristic;

class CaracteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Characteristic::insert([
            ['name'=>'Vue sur le jardin'],
            ['name'=>'Climatisation'],
            ['name'=>'Parking gratuit'],
            ['name'=>'Connexion Wi-Fi gratuite'],
            ['name'=>'Baignoire'],
            ['name'=>'Terrasse'],
            ['name'=>'Piscine extérieure'],
            ['name'=>'Front de mer'],
            ['name'=>'TV'],
        ]);
    }
}
