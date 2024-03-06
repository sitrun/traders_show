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
        Schema::create('tgbot_texts', function (Blueprint $table) {
            $table->id();

	        $table->string('name');
	        $table->text('message')->nullable();
	        $table->string('message_type')->nullable();
	        $table->string('media_id')->nullable();

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
        Schema::dropIfExists('tgbot_texts');
    }
};
