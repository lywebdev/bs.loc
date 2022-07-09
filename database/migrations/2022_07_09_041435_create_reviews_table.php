<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Имя пользователя, оставляющего отзыв');
            $table->string('email')->nullable()->comment('Email пользователя, оставляющего отзыв');
            $table->string('photo')->nullable()->comment('Аватар пользователя, оставляющего отзыв');
            $table->text('text')->comment('Текст оставляемого пользователем отзыва');
            $table->bigInteger('product_id')->comment('ID товара, для которого пользователь пишет отзыв');
            $table->boolean('status')->default(false)->comment('Статус отзыва, опублкиован или нет');
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
        Schema::dropIfExists('reviews');
    }
}
