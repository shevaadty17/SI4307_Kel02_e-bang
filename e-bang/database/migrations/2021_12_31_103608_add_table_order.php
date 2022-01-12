<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->bigInteger('id_user');
            $table->string('order_code', 255);
            $table->string('order_date', 255);
            $table->string('order_price', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->bigIncrements('oitem_id');
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->timestamps();
        });

        Schema::create('order_buffer', function (Blueprint $table) {
            $table->bigIncrements('obuffer_id');
            $table->bigInteger('id_user');
            $table->bigInteger('product_id');
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
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_item');
        Schema::dropIfExists('order_buffer');
    }
}
