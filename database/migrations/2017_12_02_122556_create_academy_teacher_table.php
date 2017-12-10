<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_teacher', function (Blueprint $table) {
            $table->integer('academy_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->index(['academy_id', 'teacher_id']);
            $table->foreign('academy_id')
                    ->references('id')->on('academies')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academy_teacher');
    }
}
