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
        Schema::create('tgbotusers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id');
	        $table->integer('lesson_count')->nullable();
	        $table->bigInteger('refer_id')->default(0)->nullable();

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
        Schema::dropIfExists('tgbotusers');
    }
};
