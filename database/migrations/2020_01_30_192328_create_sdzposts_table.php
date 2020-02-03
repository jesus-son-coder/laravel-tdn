<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSdzpostsTable extends Migration
{
    public function up()
    {
    	Schema::create('sdz_posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('titre', 255);
			$table->text('contenu');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				  ->references('id')
				  ->on('sdz_users')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('sdz_posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::drop('posts');
	}
}
