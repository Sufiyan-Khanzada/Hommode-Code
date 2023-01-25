<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
             $table->id();
             $table->string('title');
             $table->string('short_description');
             $table->string('long_description');
             $table->string('normal_price');
             $table->string('sale_price');
             $table->string('category');
             $table->string('sub_category');
             $table->string('sku_code');
             $table->string('color');
             $table->string('how_to_use');
             $table->string('reviews');
             $table->string('stock_available');
             $table->string('images');
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
        Schema::dropIfExists('items_');
    }
};
