<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculty_experience', function (Blueprint $table) {
        $table->increments('id');
        $table->string('faculty_id');
        $table->string('type');
        $table->string('role');
        $table->text('description');
        $table->string('duration');
        $table->string('organization');
        $table->timestamps();
        $table->foreign('faculty_id')->references('username')->on('instructors')->onDelete('cascade');
      }
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
