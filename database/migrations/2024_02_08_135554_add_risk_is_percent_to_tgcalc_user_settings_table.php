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
        Schema::table('tgcalc_user_settings', function (Blueprint $table) {
            //
	        $table->tinyInteger('risk_is_percent')->default(0)->nullable();
        });
	    /*Schema::connection( 'pgsql_dev' )->create( 'foos', function( Blueprint $table )
	    {
		    $table->id();
		    $table->timestamps();
	    });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tgcalc_user_settings', function (Blueprint $table) {
	        //Удалить столбцы
	        $table->dropColumn(['risk_is_percent']);
        });
    }
};
