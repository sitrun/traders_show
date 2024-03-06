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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

	        $table->string('name');
	        $table->float('price');
	        $table->string('currency')->default('USDT');
	        $table->text('description')->nullable();
	        $table->string('img')->nullable();
	        $table->integer('duration_days')
		        ->comment('Продолжительность подписки')->default(1);
	        $table->float('discount_percent')->nullable();
	        $table->timestamp('discount_findate')
	              ->comment('Дата окончания скидки')->nullable();
	        $table->tinyInteger('active')->default(1);

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
        Schema::dropIfExists('prices');
    }
};
