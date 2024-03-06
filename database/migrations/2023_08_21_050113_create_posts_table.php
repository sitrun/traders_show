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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

			$table->string('name_post');
			$table->string('slug')
			      ->comment('для url ЧПУ адреса')
			      ->default('');
			$table->text('short_desc')
			      ->comment('Краткое содержание слева')->nullable();
			$table->longText('content')
			      ->comment('Содержимое статьи')
			      ->default('');
			$table->timestamp('public_start')
			      ->comment('Начало публикации')->nullable();
			$table->timestamp('public_end')
			      ->comment('Конец публикации')->nullable();
			$table->string('policy_view')
//			$table->json('policy_view')
			      ->comment('Кто может просматривать, политика');
			$table->string('policy_comments')
//			$table->json('policy_comments')
			      ->comment('Кто может просматривать, политика');
			$table->string('seo_name')->default('');
			$table->text('seo_tags')->default('');
			$table->text('seo_desc')->default('');

			$table->text('cover_img')->default('')->nullable();

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
        Schema::dropIfExists('posts');
    }
};
