<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyExperience extends Model
{
  protected $table='faculty_experience';
  protected $fillable = ['faculty_id','type','role', 'description', 'duration','organization'];
  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor','faculty_id','username');
  }
}
