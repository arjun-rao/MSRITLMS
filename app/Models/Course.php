<?php namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
    
    class Course extends Model 
    {

        protected $primaryKey = 'course_code';
        public $timestamps = false;
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['course_code', 'department_code', 'semester','title','credits','duration','description','status'];

        //Define Eloquent Relationships with other models
        public function department()
        {
            return $this->belongsTo('App\Models\Department','department_code','department_code');
        }

        public function instructors()
        {
            return $this->belongsToMany('App\Models\Instructor','course_instructor','course','instructor');
        }

        public function pages()
        {
            return $this->hasMany('App\Models\Page','parent_code','course_code');
        }

        public function uploads()
        {
            return $this->hasMany('App\Models\Upload','parent_code','course_code')->orderBy('created_at');
        }

        public function announcements()
        {
            return $this->hasMany('App\Models\Announcement','parent_code','course_code')->orderBy('updated_at','desc');
        }

        public function links()
        {
            return $this->hasMany('App\Models\Link','parent_code','course_code');
        }

        public function questions()
        {
            return $this->hasMany('App\Models\Question','parent_code','course_code')->orderBy('updated_at');
        }

        public function isVisible()
        {
            if($this->status == 'published')
                return true;
            else
                return false;
        }
	}


/*

$table->string('course_code')->unique();
            $table->string('department_code');
            $table->integer('semester');
            $table->string('title');
            $table->string('credits');
            $table->string('duration');
            $table->text('description');
            $table->string('status');
            $table->primary('course_code');
            $table->foreign('department_code')->references('department_code')->on('departments');


 */

