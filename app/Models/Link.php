<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title','href','parent_code', 'weight'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course','parent_code','course_code');
    }
}


/*
$table->increments('id');
$table->string('title');
$table->string('href')->unique();
$table->string('parent_code');
$table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
$table->integer('weight');
$table->timestamps();
 */