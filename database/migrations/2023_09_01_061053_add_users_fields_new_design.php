<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

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
            //Добавляем новые поля
	        $table->string('family', 50)->default('');
	        $table->string('second_name', 50)->default('');
	        $table->string('nickname', 50)->default('');
	        $table->date('birthday')->default(new Expression('(CURRENT_DATE)'));
	        $table->boolean('sex')->default(1);
	        $table->string('country')->default('Россия');
	        $table->string('city')->default('Москва');
	        $table->string('tel')->default('');
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
            //Удаляем столбцы
	        $table->dropColumn(['family', 'second_name', 'nickname', 'birthday', 'sex', 'country', 'city', 'tel']);
        });
    }
};
