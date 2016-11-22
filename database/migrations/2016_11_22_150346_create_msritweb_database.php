<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMsritwebDatabase extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
         public function up()
         {
            
         /**
	     * Table: users
	     */
	    Schema::create('users', function($table) {
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('username', 255);
                $table->string('email', 255);
                $table->string('password', 60);
                $table->string('role', 255);
                $table->integer('semester');
                $table->string('remember_token', 100)->nullable();
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('users_email_unique');
                $table->index('users_username_unique');
            });

        /**
	     * Table: departments
	     */
	    Schema::create('departments', function($table) {
                $table->increments('department_code', 255);
                $table->string('name', 255);
                $table->string('hod', 255);
                $table->index('departments_department_code_unique');
            });


         /**
	     * Table: courses
	     */
	    Schema::create('courses', function($table) {
                $table->increments('course_code', 255);
                $table->string('department_code', 255);
                $table->integer('semester');
                $table->string('title', 255);
                $table->string('credits', 255);
                $table->string('duration', 255);
                $table->text('description');
                $table->string('status', 255);
                $table->index('courses_course_code_unique');
                $table->index('courses_department_code_foreign');
            });


	    /**
	     * Table: announcements
	     */
	    Schema::create('announcements', function($table) {
                $table->increments('id')->unsigned();
                $table->string('content', 255);
                $table->string('parent_code', 255)->nullable();
                $table->string('creator', 255);
                $table->string('status', 255);
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('announcements_parent_code_foreign');
            });


	    /**
	     * Table: instructors
	     */
	    Schema::create('instructors', function($table) {
                $table->increments('username', 255);
                $table->string('department_code', 255);
                $table->string('imageurl', 255)->default("/img/faculty.png");
                $table->string('designation', 255);
                $table->string('qualification', 255);
                $table->string('researcharea', 255);
                $table->string('date_of_joining', 255);
                $table->string('date_of_birth', 255);
                $table->string('address', 255);
                $table->string('phone', 255);
                $table->string('msritemail', 255);
                $table->string('gender', 255);
                $table->string('website', 255);
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('instructors_username_unique');
                $table->index('instructors_department_code_unique');
            });
            
        /**
	     * Table: course_instructor
	     */
	    Schema::create('course_instructor', function($table) {
                $table->string('course', 255);
                $table->string('instructor', 255);
                $table->index('course_instructor_course_foreign');
                $table->index('course_instructor_instructor_foreign');
            });


	   

	   


	    


	    /**
	     * Table: links
	     */
	    Schema::create('links', function($table) {
                $table->increments('id')->unsigned();
                $table->string('title', 255);
                $table->string('href', 255);
                $table->string('parent_code', 255)->nullable();
                $table->integer('weight');
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('links_href_unique');
                $table->index('links_parent_code_foreign');
            });


	    /**
	     * Table: pages
	     */
	    Schema::create('pages', function($table) {
                $table->increments('id')->unsigned();
                $table->string('title', 255);
                $table->string('slug', 255);
                $table->string('parent_code', 255)->nullable();
                $table->mediumText('content');
                $table->boolean('menulink');
                $table->string('creator', 255);
                $table->string('status', 255);
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('id');
                $table->index('pages_parent_code_foreign');
            });


	    /**
	     * Table: password_resets
	     */
	    Schema::create('password_resets', function($table) {
                $table->string('email', 255);
                $table->string('token', 255);
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->index('password_resets_email_index');
                $table->index('password_resets_token_index');
            });


	    /**
	     * Table: questions
	     */
	    Schema::create('questions', function($table) {
                $table->increments('id')->unsigned();
                $table->string('text', 255);
                $table->string('studentname', 255);
                $table->string('studentemail', 255);
                $table->string('parent_code', 255);
                $table->string('answer', 500)->default("pending");
                $table->string('facultyname', 255)->default("pending");
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('questions_parent_code_foreign');
            });


	    /**
	     * Table: uploads
	     */
	    Schema::create('uploads', function($table) {
                $table->increments('id')->unsigned();
                $table->string('file_name', 255);
                $table->string('slug', 255);
                $table->string('description', 255);
                $table->string('type', 255);
                $table->string('link', 255);
                $table->string('file_size', 255);
                $table->string('uploader', 255);
                $table->string('parent_code', 255);
                $table->string('status', 255);
                $table->timestamp('created_at')->default("0000-00-00 00:00:00");
                $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
                $table->index('uploads_file_name_unique');
                $table->index('uploads_slug_unique');
                $table->index('uploads_parent_code_foreign');
            });


	   

         }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
         public function down()
         {
            
	            Schema::drop('announcements');
	            Schema::drop('course_instructor');
	            Schema::drop('courses');
	            Schema::drop('departments');
	            Schema::drop('instructors');
	            Schema::drop('links');
	            Schema::drop('pages');
	            Schema::drop('password_resets');
	            Schema::drop('questions');
	            Schema::drop('uploads');
	            Schema::drop('users');
         }

}