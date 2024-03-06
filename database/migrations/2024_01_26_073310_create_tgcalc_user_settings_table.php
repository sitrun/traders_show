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
        Schema::create('tgcalc_user_settings', function (Blueprint $table) {
            $table->id();

	        $table->bigInteger('user_id');
	        $table->float('base_deposit')->nullable();
	        $table->float('base_risk_percent')->nullable();
	        $table->string('base_currency')->nullable();
	        $table->integer('uses_count')->default(100);
	        $table->string('take_profit_to_show')->nullable();
	        $table->string('market')->nullable();


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
        Schema::dropIfExists('tgcalc_user_settings');
    }
};
