<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlmacenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('almacenes')->insert([
                'nombre' => $faker->company,
                'direccion' => $faker->address,
                'telefono' => $faker->numerify('########'), // 10 dígitos aleatorios
                'capacidad' => $faker->numberBetween(100, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
