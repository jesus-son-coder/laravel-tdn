<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Sdz\Editeur::class, 40)->create();
        factory(App\Models\Sdz\Auteur::class, 40)->create();
        factory(App\Models\Sdz\Livre::class, 80)->create();

        for($i = 1; $i < 41 ; $i++) {
            $number = rand(2, 8);
            for ($j = 1; $j <= $number; $j++) {
                DB::table('sdz_auteur_livre')->insert([
                    'livre_id' => rand(1, 40),
                    'auteur_id' => $i
                ]);
            }
        }
    }
}
