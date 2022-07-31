<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDeliveryDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_delivery_data', function (Blueprint $table) {
            $table->id();

            $table->string('method');
            $table->string('track')->unique()->nullable();
            $table->string('country')->nullable()->default('Россия');
            $table->string('city')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_delivery_data');
    }
}
