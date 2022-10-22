<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateContactInfoTranslationsTable.
 */
class CreateContactInfoTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_info_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contact_info_id');
            $table->string('locale')->index();

            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone');

            $table->timestamps();

            $table->unique(['contact_info_id', 'locale']);
            $table->foreign('contact_info_id')
                ->references('id')
                ->on('contact_infos')
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
		Schema::drop('contact_info_translations');
	}
}
