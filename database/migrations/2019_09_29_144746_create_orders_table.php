<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->biginteger('studentId')->unsigned();
            $table->integer('shopId')->unsigned();
            $table->string('takingTime');
            $table->bigInteger('total');
            $table->boolean('flag')->default('0');
            $table->string('orderCode');
            $table->timestamps();

            $table->foreign('shopId')
            ->references('id')
            ->on('shops')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('studentId')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('orders');
    }
}
