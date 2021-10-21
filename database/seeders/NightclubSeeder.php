<?php

namespace Database\Seeders;

use App\Models\Nightclub;
use Illuminate\Database\Seeder;

class NightclubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos una instancia de Faker
        $faker = Faker::create();

        // Creamos un bucle para cubrir 5 nightclubs:
        for ($i=0; $i<4; $i++)
        {
            Nightclub::create(
                [
                    'name'=>$faker->word(),
                    'salsa'=>$faker->word(),
                    'bachata'=>$faker->word(),
                    'kizomba'=>$faker->word(),
                    'price'=>$faker->word(),
                    'address'=>$faker->word(),
                    'parking'=>$faker->word(),
                    'details'=>$faker->word(),
                ]
            );
        }
    }
}
