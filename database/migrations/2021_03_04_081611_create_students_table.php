<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 5);
            $table->string('name', 25);
            $table->string('gender', 1);
            $table->string('school_name', 25);
            $table->string ('address', 25);
            $table->string('birth_place', 25);
            $table->date('birth_date');
            $table->string('parents_name', 25);
            $table->string('phone_no', 13);
            $table->string('parent_occupation', 20);
            $table->string('tuition_fee', 7);
            $table->date('join_date');
            $table->timestamps();

            $table->primary('student_id', 5);
            $table->foreign('student_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
