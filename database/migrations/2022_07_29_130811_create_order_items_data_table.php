<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items_data', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->string('product_name');
            $table->double('product_price');
            $table->integer('product_quantity');
            $table->double('total_price');

            $table->string('promocode')->nullable();
            $table->double('promocode_discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items_data');
    }
}
