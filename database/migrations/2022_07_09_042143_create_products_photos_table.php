<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->comment('ID товара');
            $table->string('filename')->comment('Путь к файлу');
            $table->integer('sort')->default(0)->comment('Порядковый номер для сортировки');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_photos');
    }
}
