<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usando el faker para generar datos falsos
        $faker = \Faker\Factory::create();

        // Obtener todos los IDs de almacenes disponibles
        $almacenesIds = \App\Models\Almacene::pluck('id')->toArray();

        // Iterar para crear 100 productos falsos
        for ($i = 0; $i < 100; $i++) {
            Producto::create([
                'nombre' => $faker->word,
                'cantidad' => $faker->numberBetween(100, 1000),
                'almacen_id' => $faker->randomElement($almacenesIds),
            ]);
        }
    }
}
