<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSliderTranslationsTable.
 */
class CreateSliderTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider_translations', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('slider_id');
            $table->string('locale')->index();
            $table->string('thumbnail');
            $table->string('content');
            $table->timestamps();

            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
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
		Schema::drop('slider_translations');
	}
}
