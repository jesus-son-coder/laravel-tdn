<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TagTableSeeder extends Seeder
{
    private function ranDate()
    {
        return Carbon::createFromDate(null, rand(1,12), rand(1,28) );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sdz_tags')->delete();

        for($i=0; $i<20; ++$i)
        {
            $date = $this->ranDate();
            DB::table('sdz_tags')->insert(array(
               'tag' => 'tag' . $i,
               'tag_url' => 'tag' . $i,
               'created_at' => $date,
               'updated_at' => $date
            ));
        }
    }
}
