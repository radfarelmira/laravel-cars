<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars_array = config('cars');

        foreach( $cars_array as $car ){

            $new_car = new Car();
            $new_car->marca = $car['marca'];
            $new_car->modello = $car['modello'];
            $new_car->cilindrata = $car['cilindrata'];
            $new_car->porte = $car['porte'];
            $new_car->img = $car['img'];
            $new_car->save();
        }
    }
}
