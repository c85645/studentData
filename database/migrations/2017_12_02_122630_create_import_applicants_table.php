<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academy_id')->nullable();
            $table->string('exam_number', 10)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('gender')->nullable();
            $table->string('graduated_school')->nullable();
            $table->string('graduated_department')->nullable();
            $table->string('equivalent_qualifications')->nullable();
            $table->string('identity')->nullable();
            $table->string('graduated_school_classification')->nullable();
            $table->char('birth', 8)->nullable();
            $table->string('personal_id', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->char('mobile', 10)->nullable();
            $table->string('email', 50)->nullable();
            $table->char('step', 1)->nullable();
            $table->decimal('score1', 5, 2)->nullable();
            $table->decimal('score2', 5, 2)->nullable();
            $table->decimal('score3', 5, 2)->nullable();
            $table->decimal('score4', 5, 2)->nullable();
            $table->decimal('score5', 5, 2)->nullable();
            $table->decimal('total_score', 5, 2)->nullable();
            $table->string('is_pass', 5)->nullable();
            $table->timestamp('import_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_applicants');
    }
}
