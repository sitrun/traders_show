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
        Schema::create('tgbot_posts', function (Blueprint $table) {
            $table->id();

	        $table->text('content')->nullable();
	        $table->string('message_type')->default('text')->nullable();
	        $table->string('media')->nullable();
	        $table->string('direct')->default('')->nullable();
	        $table->string('name')->nullable();
	        $table->float('open_price')->nullable();
	        $table->float('stop_loss')->nullable();
	        $table->string('ticker')->nullable();
	        $table->timestamp('date_time')->nullable();

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
        Schema::dropIfExists('tgbot_posts');
    }
};
