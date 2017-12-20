<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academy_id');
            $table->string('name')->nullable();
            $table->string('personal_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('pdf_path')->nullable();
            $table->string('transfer_grade')->nullable();
            $table->timestamp('upload_time')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
