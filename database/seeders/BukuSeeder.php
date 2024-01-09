<?php

namespace Database\Seeders;

use App\Models\BukuModel;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id');
        for ($i = 0; $i < 10; $i++) {
            BukuModel::create(
                [
                    'judul' => $faker->sentence,
                    'pengarang' => $faker->name,
                    'tanggal_publikasi' => $faker->date,
                ]
            );
        }
    }
}
