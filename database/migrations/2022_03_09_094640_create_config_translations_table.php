<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConfigTranslationsTable.
 */
class CreateConfigTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('config_translations', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('config_id');
            $table->string('locale')->index();
            $table->text('value');
            $table->timestamps();

            $table->unique(['config_id', 'locale']);
            $table->foreign('config_id')
                ->references('id')
                ->on('configs')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('config_translations');
	}
}
