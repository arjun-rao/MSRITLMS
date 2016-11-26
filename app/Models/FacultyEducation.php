<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyEducation extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['faculty_id','degree','year','university','discipline'];

    public function instructor()
    {
        return $this->belongsTo('App\Models\Instructor', 'faculty_id', 'username');

    }
}
