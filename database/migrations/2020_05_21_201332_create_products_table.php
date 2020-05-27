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
            $table->bigIncrements('id');
            $table->string('SKU', 25)->unique();
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('shot_description', 200)->nullable();
            $table->float('price');
            $table->integer('discount')->default(0);
            $table->unsignedInteger('quantity')->default(0);
           
            
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
