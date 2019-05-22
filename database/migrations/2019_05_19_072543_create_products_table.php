<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title');
             $table->string('slug');
            $table->string('description');
             $table->boolean('exclusive')->default(0);
            $table->double('price');
            $table->boolean('discount');
            $table->string('discount_price');
            $table->string('thumbnail');
                $table->boolean('featured')->default(0);
              $table->boolean('status')->default(0);
            $table->text('option');
            $table->softDeletes();
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
