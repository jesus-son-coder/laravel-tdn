<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdz_auteurs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom', 100)->unique();
		});
		Schema::create('sdz_editeurs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom', 100)->unique();
		});
		Schema::create('sdz_livres', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('titre', 100);
			$table->integer('editeur_id')->unsigned();
			$table->text('description');
		});
		Schema::create('sdz_auteur_livre', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('auteur_id')->unsigned();
			$table->integer('livre_id')->unsigned();
		});
		Schema::table('sdz_livres', function(Blueprint $table) {
			$table->foreign('editeur_id')->references('id')->on('sdz_editeurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sdz_auteur_livre', function(Blueprint $table) {
			$table->foreign('auteur_id')->references('id')->on('sdz_auteurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sdz_auteur_livre', function(Blueprint $table) {
			$table->foreign('livre_id')->references('id')->on('sdz_livres')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sdz_livres', function(Blueprint $table) {
			$table->dropForeign('livres_editeur_id_foreign');
		});
		Schema::table('sdz_auteur_livre', function(Blueprint $table) {
			$table->dropForeign('auteur_livre_auteur_id_foreign');
		});
		Schema::table('sdz_auteur_livre', function(Blueprint $table) {
			$table->dropForeign('auteur_livre_livre_id_foreign');
		});
		Schema::drop('sdz_auteur_livre');
		Schema::drop('sdz_livres');
		Schema::drop('sdz_auteurs');
		Schema::drop('sdz_editeurs');
    }
}
