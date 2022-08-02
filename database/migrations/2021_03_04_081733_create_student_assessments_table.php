<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessments', function (Blueprint $table) {
            $table->string('student_assessment_id', 5);
            $table->string('student_id', 5);
            $table->string('class_id', 5);
            $table->string('number_of_memorization', 7)->nullable();
            $table->string('behavior', 10)->nullable();
            $table->string('dilligence', 10)->nullable();
            $table->string('neatness', 10)->nullable();
            $table->string('ibadah', 10)->nullable();
            $table->string('note', 300)->nullable();
            $table->string('class', 20)->nullable();
            $table->timestamps();

            $table->primary('student_assessment_id');
            $table->foreign('class_id')->references('class_id')->on('class')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assessments');
    }
}
