<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCartModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_cart_models', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
             $table->string('user_ip');
            $table->string('product_quantity')->default(1);
           
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
        Schema::dropIfExists('add_cart_models');
    }
}
