<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadandlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('href')->unique();
            $table->string('parent_code');
            $table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
            $table->integer('weight');
            $table->timestamps();
        });

        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name')->unique();
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('type');
            $table->string('link');
            $table->string('file_size');
            $table->string('uploader');
            $table->string('parent_code');
            $table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
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
        Schema::drop('uploads');
        Schema::drop('links');
    }
}


