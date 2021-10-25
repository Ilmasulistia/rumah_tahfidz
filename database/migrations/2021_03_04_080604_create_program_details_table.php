<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_details', function (Blueprint $table) {
            $table->string('detail_id', 3);
            $table->string('materi', 30);
            $table->string('program_id', 3);
            $table->timestamps();

            $table->primary('detail_id', 3);
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_details');
    }
}
