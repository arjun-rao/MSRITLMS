<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_code';

    public function courses()
    {
        return $this->hasMany('App\Models\Course','department_code','department_code');
    }
    public function instructors()
    {
        return $this->hasMany('App\Models\Instructor','department_code','department_code');
    }
}
