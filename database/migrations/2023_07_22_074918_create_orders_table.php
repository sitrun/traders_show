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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('userid');
            $table->string('market');
            $table->string('date')->nullable();
            $table->string('time')->nullable();
	        $table->string('dep')->comment('Размер депозита');
	        $table->string('risk')->nullable();
	        $table->string('paire')->default('none');
	        $table->string('symbol');
	        $table->string('open');
	        $table->string('stop');
	        $table->string('pips')->default('none');
	        $table->string('volume')->comment('Объем valume');
	        $table->string('buy_on');
	        $table->string('tp_price');
	        $table->string('risk_money');
	        $table->string('cur')->default('none');
	        $table->string('credit');
	        $table->string('lot')->default('none');
	        $table->string('tp_money');
	        $table->string('multiplier');
	        $table->string('status');
	        $table->string('type_order');
	        $table->string('save_mode')->default('auto');
	        $table->string('date_die')->nullable();
	        $table->string('time_die')->nullable();
	        $table->string('style_trade')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
