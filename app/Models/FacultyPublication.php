<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyPublication extends Model
{
  protected $table = 'faculty_publication';
  protected $fillable = ['faculty_id','year_of_publication','article_title','type','publication_title','publisher','publication_link','domain'];
  public function instructor()
  {
      return $this->belongsTo('App\Models\Instructor','faculty_id','username');
  }
}
