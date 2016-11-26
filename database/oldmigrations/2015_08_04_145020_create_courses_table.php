<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('course_code')->unique();
            $table->string('department_code');
            $table->integer('semester');
            $table->string('title');
            $table->string('credits');
            $table->string('duration');
            $table->text('description');
            $table->string('status');
            $table->primary('course_code');
            $table->foreign('department_code')->references('department_code')->on('departments');
        });

        Schema::table('pages', function($table) {
            $table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}

