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
            $table->string('exam_number')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('graduated_school')->nullable();
            $table->string('graduated_department')->nullable();
            $table->string('equivalent_qualifications')->nullable();
            $table->string('identity')->nullable();
            $table->string('graduated_school_classification')->nullable();
            $table->string('birth')->nullable();
            $table->string('personal_id')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('is_pass')->default('N');
            $table->timestamp('import_time')->nullable();
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
        Schema::dropIfExists('import_applicants');
    }
}
