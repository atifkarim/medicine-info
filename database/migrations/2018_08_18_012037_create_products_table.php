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
            $table->increments('id');
            $table->string('name');
            $table->boolean('available_in_pregnancy')->default(false);
            $table->text('side_effect')->nullable();
            $table->text('alert')->nullable();

            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedInteger('generic_id');
            $table->foreign('generic_id')->references('id')->on('generics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['generic_id']);
        });
        Schema::dropIfExists('products');
    }
}
