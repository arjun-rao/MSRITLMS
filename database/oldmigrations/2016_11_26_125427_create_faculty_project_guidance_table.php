<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyProjectGuidanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculty_project_guidance', function (Blueprint $table) {
          $table->increments('id');
          $table->string('faculty_id');
          $table->string('title');
          $table->string('area');
          $table->string('type');
          $table->string('count');
          $table->string('year');
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
          Schema::drop('faculty_project_guidance');
    }
}
