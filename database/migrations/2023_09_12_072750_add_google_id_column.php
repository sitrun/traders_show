<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Сохраняем токен google
	    Schema::table('users', function ($table) {

		    $table->string('google_id')->nullable();
		    $table->string('google_token')->nullable();
		    $table->string('google_refresh_token')->nullable();

	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Удаляем токен google из таблицы
	    Schema::table('users', function ($table) {

		    $table->dropColumn(['google_id', 'google_token', 'google_refresh_token']);

	    });
    }
};
