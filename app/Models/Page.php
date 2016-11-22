<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug','parent_code', 'content', 'menulink','creator','status'];

    public function isVisible()
    {
        if($this->status != 'draft' or Auth::user()->isFaculty())
            return true;
        else
            return false;
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course','parent_code','course_code');
    }


}


/*
 $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('parent_code');
            $table->mediumText('content');
            $table->boolean('menulink');
            $table->string('creator');
            $table->string('status');
            $table->timestamps();
 */