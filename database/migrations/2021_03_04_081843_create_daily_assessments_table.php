<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_assessments', function (Blueprint $table) {
            $table->string('daily_assessment_id', 5);
            $table->string('student_assessment_id', 5);
            $table->date('date_of_recitation');
            $table->string('verse', 7);
            $table->string('verse_end', 7);
            $table->string('information', 12);
            $table->string('surah_no', 3);
            $table->timestamps();

            $table->primary((['daily_assessment_id']));
            $table->foreign('student_assessment_id')->references('student_assessment_id')->on('student_assessments')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_assessments');
    }
}
