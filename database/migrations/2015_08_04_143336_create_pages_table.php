<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('parent_code');
            $table->mediumText('content');
            $table->boolean('menulink');
            $table->string('creator');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}


/*
 * id - integer
	title - string
	slug - string -unique();
	$table->string(‘parent_code’);
	parent_code - string ($table->foreign(‘course_code’)->references(‘course_code’)->on(‘courses’)->onDelete('cascade’);)
	pagehtml - text
	menu link - yes/no to display in menu
	creator	 - username of creator
	status - published/draft
	timestamps();

 */