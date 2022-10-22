<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePostTranslationsTable.
 */
class CreatePostTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('slug');
            $table->string('short_description');
            $table->text('content');
            $table->timestamps();

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
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
		Schema::drop('post_translations');
	}
}
