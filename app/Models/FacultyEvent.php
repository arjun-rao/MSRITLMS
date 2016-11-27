<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyEvent extends Model
{


  protected $table = 'faculty_event';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title','duration','faculty_id','location','report_link','type','organisation'];

  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor','faculty_id','username');
  }

}
