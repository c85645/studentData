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
            $table->integer('academy_id');
            $table->integer('step')->default(1);
            $table->integer('no');
            $table->string('name')->nullable();
            $table->decimal('percent', 5, 0)->default(0);
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
