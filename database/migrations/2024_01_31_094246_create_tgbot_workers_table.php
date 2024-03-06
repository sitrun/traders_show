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
        Schema::create('tgbot_workers', function (Blueprint $table) {
            $table->id();

	        $table->bigInteger('tg_user_id');
	        $table->string('tg_username')->nullable();
	        $table->tinyInteger('role')->nullable();

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
        Schema::dropIfExists('tgbot_workers');
    }
};
