<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGuidance extends Model
{
  protected $table = 'faculty_project_guidance';
  protected $fillable = ['faculty_id','title','area','type','count','year'];

  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor', 'faculty_id', 'username');

  }
}
