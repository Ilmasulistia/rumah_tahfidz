<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAssessmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessment_details', function (Blueprint $table) {
            $table->string('student_id', 5);
            $table->string('class_id', 5);
            $table->string('number', 7);
            $table->string('affective', 10);
            $table->string('detail_id', 10);
            $table->timestamps();
            
            $table->primary((['student_id', 'class_id']));
            $table->foreign('class_id')->references('class_id')->on('student_assessments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('student_id')->on('student_assessments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('detail_id')->references('detail_id')->on('program_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_assessment_details');
    }
}
