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
        Schema::table('users', function (Blueprint $table) {
            //
	        $table->string('username_tg')
	              ->comment('Имя пользователя в телеграм без знака @')
	              ->nullable();
//	        $table->string('nickname')
//	              ->comment('Имя пользователя на сайте')
//	              ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //Удялаем созданные столбцы
	        $table->dropColumn(['username_tg']);
//	        $table->dropColumn(['username_tg', 'nickname']);


        });
    }
};
