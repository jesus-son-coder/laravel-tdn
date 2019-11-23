<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('description');
           $table->string('location');
           $table->decimal('price', 5, 2);
           /*
                total '5' => nombre total de chiffre y compris après la virgule.
                    ex : 123,56  (5 chiffres au total)
                places '2' => nombre de chiffres après la virgule.
                    ex: 123,56  (2 chiffres après la virgule)
           */

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
