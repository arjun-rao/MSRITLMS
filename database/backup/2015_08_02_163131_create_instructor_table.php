<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->string('department_code')->unique();
            $table->string('imageurl');
            $table->string('designation');
            $table->string('qualification');
            $table->string('researcharea');
            $table->string('date_of_birth');
            $table->string('address');
            $table->string('phone');
            $table->string('msritemail');
            $table->string('gender');
            $table->string('website');
            $table->string('date_of_joining');
            $table->timestamps();
            $table->primary('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructors');
    }
}


/*
 * id- integer
	username - string
	department_code - string
	name - string
	emailid - string
	designation - string eg professor, assistant prof etc
	qualification - string
	researcharea - string

Basic Details
	- id - auto incremented index
	- FacultyID
	- Name
	- DoB
	- Address
	- Phone number
	- Email ID@msrit.edu
	- Role in Institution (Drop down)
	- Photo/Profile Picture - link to file on server
	- Gender
	- Website
	- Date of joining
 */