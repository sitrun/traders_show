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
        Schema::create('tgbot_options', function (Blueprint $table) {
            $table->id();

	        $table->string('name_option')
	              ->comment('Имя опции для обращения');
	        $table->text('value')->nullable();
	        $table->text('description')
		        ->comment('Название, описание или назначение опции')
		        ->nullable();
	        $table->string('category')
	              ->comment('Категория опции')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tgbot_options');
    }
};
