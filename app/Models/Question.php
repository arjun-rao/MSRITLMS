<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text','studentname','studentemail', 'parent_code', 'answer','facultyname'];
    public function course()
    {
        return $this->belongsTo('App\Models\Course','parent_code','course_code');
    }
}


