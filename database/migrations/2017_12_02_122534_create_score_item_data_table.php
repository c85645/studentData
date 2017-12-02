<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreItemDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_item_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->integer('code')->unique();
            $table->integer('step');
            $table->string('item1', 20)->nullable();
            $table->string('item2', 20)->nullable();
            $table->string('item3', 20)->nullable();
            $table->string('item4', 20)->nullable();
            $table->string('item5', 20)->nullable();
            $table->decimal('item1_percent', 5, 2)->nullable();
            $table->decimal('item2_percent', 5, 2)->nullable();
            $table->decimal('item3_percent', 5, 2)->nullable();
            $table->decimal('item4_percent', 5, 2)->nullable();
            $table->decimal('item5_percent', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_item_data');
    }
}
