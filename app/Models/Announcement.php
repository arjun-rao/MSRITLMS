<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['content','parent_code', 'creator','status'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course','parent_code','course_code');
    }

    public function isVisible()
    {
        if($this->status == 'published')
            return true;
        else
            return false;
    }
}


/*
$table->increments('id');
$table->string('content');
$table->string('parent_code');
$table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
$table->string('creator');
$table->string('status');
$table->timestamps();
 */