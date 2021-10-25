<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->string('management_id', 10);
            $table->year('start_periode');
            $table->string('nik', 16);
            $table->string('position', 40);
            $table->timestamps();
            
            $table->primary('management_id', 3);
            $table->foreign('nik')->references('nik')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management');
    }
}
