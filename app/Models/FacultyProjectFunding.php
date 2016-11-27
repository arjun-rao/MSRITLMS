<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyProjectFunding extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'faculty_project_funding';
  protected $fillable = ['faculty_id','project_title','funding_agency','duration','amount'];

  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor','faculty_id','username');
  }
}
