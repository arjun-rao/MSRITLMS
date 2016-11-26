<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyProjectFundingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculty_project_funding', function (Blueprint $table) {
          $table->increments('id');
          $table->string('faculty_id');
          $table->string('project_title');
          $table->string('funding_agency');
          $table->string('duration');
          $table->string('amount');
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
          Schema::drop('faculty_project_funding');
    }
}
