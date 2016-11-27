<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('duration');
            $table->string('faculty_id');
            $table->string('location');
            $table->string('report_link');
            $table->string('organisation');
            $table->string('type');
            $table->timestamps();
            $table->foreign('faculty_id')->references('username')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('faculty_event');
    }
}
