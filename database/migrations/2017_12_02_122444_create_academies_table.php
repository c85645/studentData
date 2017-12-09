<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->nullable();
            $table->string('name_id', 10)->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('fill_out_sdate')->nullable();
            $table->string('fill_out_edate')->nullable();
            $table->string('score_sdate')->nullable();
            $table->string('score_edate')->nullable();
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
        Schema::dropIfExists('academies');
    }
}
