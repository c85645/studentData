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
            $table->string('code', 10)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('intro')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('fill_out_sdate', 8)->nullable();
            $table->string('fill_out_edate', 8)->nullable();
            $table->string('score_sdate', 8)->nullable();
            $table->string('score_edate', 8)->nullable();
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
