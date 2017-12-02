<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('academy_id');
            $table->integer('step');
            $table->decimal('item1_score', 5, 2)->nullable();
            $table->decimal('item2_score', 5, 2)->nullable();
            $table->decimal('item3_score', 5, 2)->nullable();
            $table->decimal('item4_score', 5, 2)->nullable();
            $table->decimal('item5_score', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
