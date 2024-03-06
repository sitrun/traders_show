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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

	        $table->bigInteger('user_id');
	        $table->string('code')->nullable();
	        $table->text('link')->nullable();
	        $table->float('sum')->nullable();
	        $table->string('currency')->nullable();
	        $table->integer('price_id')->nullable();
	        $table->string('status')->nullable();
	        $table->timestamp('payment_date')->nullable();

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
        Schema::dropIfExists('transactions');
    }
};
