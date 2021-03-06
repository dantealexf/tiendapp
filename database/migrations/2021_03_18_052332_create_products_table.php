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
            $table->uuid('id')->primary();
            $table->foreignUuid('size_id');
            $table->foreignUuid('mark_id');
            $table->string('name');
            $table->integer('quantity');
            $table->date('date_shipment');
            $table->text('observation');

            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('mark_id')->references('id')->on('marks');

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
