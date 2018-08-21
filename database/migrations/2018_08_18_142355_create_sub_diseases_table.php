<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('symptom')->nullable();
            $table->text('causes')->nullable();
            $table->text('treatment')->nullable();

            $table->unsignedInteger('diseases_id');
            $table->foreign('diseases_id')->references('id')->on('diseases');
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
        Schema::table('sub_diseases', function (Blueprint $table) {
            $table->dropForeign(['diseases_id']);
        });
        Schema::dropIfExists('sub_diseases');
    }
}
