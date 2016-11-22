<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

    class Instructor extends Model {
        protected $primaryKey = 'username';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['username', 'department_code', 'designation','qualification','researcharea','date_of_birth','address','phone','msritemail','gender','website','date_of_joining'];

        public function getDetails()
        {
            $userdata = User::find($this->username);
            $details['name'] = $userdata->name;
            $details['email']= $userdata->email;
            return $details;

        }
        public function department()
        {
            return $this->belongsTo('Department','department_code','department_code');
        }

        public function courses()
        {
            return $this->belongsToMany('App\Models\Course','course_instructor','instructor','course');
        }
    }

