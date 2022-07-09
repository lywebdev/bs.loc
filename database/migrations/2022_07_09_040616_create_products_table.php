<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->index()->comment('Наименование товара');
            $table->string('slug', 255)->unique()->comment('Слаг товара');
            $table->double('price')->comment('Стоимость товара');
            $table->double('old_price')->nullable()->comment('Старая стоимость товара');
            $table->string('availability', 16)->default(false)->comment('Наличие товара');
            $table->integer('quantity')->default(0)->comment('Количество товара');
            $table->string('vendor_code', 255)->nullable()->index()->comment('Артикул товара');

            $table->integer('category_id')->nullable()->comment('Категория товара')->references('id')->on('categories');
            $table->integer('manufacturer_id')->nullable()->comment('Производитель товара');

            $table->string('preview')->nullable()->comment('Превью товара');
            $table->boolean('status')->default(1)->comment('Статус доступности товара');

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
        Schema::dropIfExists('products');
    }
}
