<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('faculty_id');
            $table->string('degree');
            $table->string('year');
            $table->string('university');
            $table->string('discipline');
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
        Schema::drop('faculty_education');
    }
}


/*
 *
    - id (auto_inc)
    - FacultyID
    -Degree
    -Year of Passing
    -University
    -Discipline

*/