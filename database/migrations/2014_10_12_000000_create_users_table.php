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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            $table->string('id_telegram')->default('0');
	        $table->string('deposit')->default('0');
	        $table->integer('count_update_dep')->default(0);
	        $table->string('date_register')->default('');
	        $table->string('currency')->default('RUB');
	        $table->string('balance')->default('0');
	        $table->string('not_news')->default('OFF');
	        $table->string('not_signals')->default('OFF');
	        $table->string('not_orders')->default('OFF');
	        $table->string('def_save_order')->default('auto');
	        $table->string('type_trade')->default('');

	        $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
