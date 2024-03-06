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
        //Добавление внешнего ключа таблице постов posts
	    Schema::table('posts', function (Blueprint $table) {
//		    $table->bigInteger('category_id');
		    $table->after('name_post', function ($table) {
			    $table->bigInteger('category_id')->default(0);
		    });
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	    if (Schema::hasColumn('posts', 'category_id')) {
		    // Таблица `posts` существует и содержит столбец `category_id` ...
		    Schema::table('posts', function (Blueprint $table) {
			    $table->dropColumn('category_id');
			    //Удаление внешнего ключа - видимо из под той таблицы где есть первичны ключ
//			    $table->dropForeign('category_id');
		    });


	    }
    }
};
