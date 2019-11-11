<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orderId')->unsigned();
            $table->bigInteger('menuId')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('menuId')
            ->references('id')
            ->on('menus')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('orderId')
            ->references('id')
            ->on('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
