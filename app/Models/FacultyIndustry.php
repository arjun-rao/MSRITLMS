<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyIndustry extends Model
{
  protected $fillable = ['faculty_id','organization','description', 'duration', 'report_link'];
  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor','faculty_id','username');
  }
}
