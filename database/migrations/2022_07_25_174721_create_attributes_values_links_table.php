<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesValuesLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_values_links', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned()->comment('ID товара');
            $table->bigInteger('attribute_id')->unsigned()->comment('ID характеристики');
            $table->bigInteger('attribute_value_id')->unsigned()->comment('ID значения характеристики');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes_values_links');
    }
}
