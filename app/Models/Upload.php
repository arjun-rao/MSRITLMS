<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $primaryKey = 'slug';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['file_name','slug','description','type','link','file_size','uploader','parent_code','status'];

    public function isVisible()
    {
        if($this->status == 'published')
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
$table->string('file_name')->unique();
$table->string('slug')->unique();
$table->string('description');
$table->string('type');
$table->string('link');
$table->string('uploader');
$table->string('parent_code');
$table->foreign('parent_code')->references('course_code')->on('courses')->onDelete('cascade');
$table->string('status');
$table->timestamps();
 */