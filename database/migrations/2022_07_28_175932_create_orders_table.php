<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_id');
            $table->string('order_time');

            $table->bigInteger('order_customer_data_id')->nullable();
            $table->bigInteger('order_delivery_data_id')->nullable();
            $table->bigInteger('order_payment_data_id')->nullable();
            $table->bigInteger('order_items_data_id')->nullable();

            $table->text('note')->nullable();
            $table->string('status', 50);
            $table->string('cancel_reason')->nullable();
            $table->integer('total_cost');

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
        Schema::dropIfExists('orders');
    }
}
