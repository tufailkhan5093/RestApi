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
            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('max_price');
            $table->bigInteger('discount_price');
            $table->longText('description');
            $table->string('keywords');
            $table->string('category');
            $table->string('meta_description',300);
            $table->binary('image')->nullable();
            // $table->integer('cat_id')->unsigned();
            // $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
      
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
