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
            $table->integer('academy_id');
            $table->integer('student_id');
            $table->integer('teacher_id')->nullable();
            $table->integer('step')->default(1);
            $table->integer('no')->nullable();
            $table->decimal('score', 5, 0)->default(0);
            $table->timestamp('score_time')->nullable();
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
        Schema::dropIfExists('scores');
    }
}
