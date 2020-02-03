<?php
/**
 *  Created with PhpStorm
 * by User: @hseka
 * Date : 30/01/2020
 * Time: 20:34
 **/



use Illuminate\Database\Seeder;

class SdzUserTableSeeder extends Seeder
{
    public function run()
	{
		DB::table('sdz_users')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			DB::table('sdz_users')->insert([
				'name' => 'Nom' . $i,
				'email' => 'email' . $i . '@blop.fr',
				'password' => bcrypt('password' . $i),
				'admin' => rand(0, 1)
			]);
		}
	}
}