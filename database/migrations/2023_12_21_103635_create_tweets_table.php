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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();

	        $table->bigInteger('user_id');
	        $table->tinyText('text');
	        $table->tinyInteger('is_public')->default(0);
	        $table->timestamp('public_at')
	              ->comment('Дата публикации твита - у себя или публично')->nullable();

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
        Schema::dropIfExists('tweets');
    }
};
