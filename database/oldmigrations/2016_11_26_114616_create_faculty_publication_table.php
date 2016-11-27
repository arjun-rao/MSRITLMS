<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculty_publication', function (Blueprint $table) {
          $table->increments('id');
          $table->string('faculty_id');
          $table->string('year_of_publication');
          $table->string('article_title');
          $table->string('type');
          $table->string('publication_title');
          $table->string('publisher');
          $table->string('publication_link');
          $table->string('domain');
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
            Schema::drop('faculty_publication');
    }
}
