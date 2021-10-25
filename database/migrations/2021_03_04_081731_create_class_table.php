<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->string('class_id', 5);
            $table->string('semester', 16);
            $table->year('year');
            $table->string('nik', 16);
            $table->string('course_id', 5);
            $table->timestamps();

            $table->primary('class_id', 5);
            $table->foreign('nik')->references('nik')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade')->onUpdate('cascade');

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
