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
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();

	        $table->string('tg_user_id');
	        $table->timestamp('finish_dt')
		        ->comment('Дата окончания подписки')->nullable();
	        $table->string('subscribe_type')
		        ->comment('Тип подписки платная - бесплатныя')->nullable();
	        $table->bigInteger('transactions_payed_id')
	              ->comment('Транзакция оплаты id')->nullable();
	        $table->tinyInteger('active')->default(0);
	        $table->integer('prices_id')
	              ->comment('Услуга тариф оказанная id')->nullable();

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
        Schema::dropIfExists('subscribes');
    }
};
