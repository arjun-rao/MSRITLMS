<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::post('courses/search','CourseController@postSearch');
Route::get('courses/add','CourseController@getAdd');
Route::post('courses/add','CourseController@postAdd');
Route::get('courses/edit/{course_code}','CourseController@getEdit');
Route::get('courses/edit','CourseController@getEdit');
Route::get('courses/delete','CourseController@getDelete');
Route::post('courses/edit','CourseController@postEdit');
Route::post('courses/delete','CourseController@postDelete');


Route::group(['prefix'=>'courses/{course_code}/','middleware'=>'course_visible'],function(){
    Route::controller('pages','PageController');
    Route::controller('uploads','UploadController');
    Route::controller('links','LinkController');
    Route::controller('questions','QuestionController');
    Route::controller('faculty','CourseFacultyController');
    Route::controller('announcements','AnnouncementController');
});

Route::group(['prefix'=>'faculty/','middleware'=>'faculty'],function(){
    Route::controller('events','Faculty\EventController');
    Route::controller('education','Faculty\EducationController');
    Route::controller('industry','Faculty\IndustryController');
});



Route::group(['middleware'=>'course_visible'],function(){
    Route::get('courses/{course_code}','CourseController@missingMethod');
});

Route::controllers([
    'home' => 'HomeController',
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'faculty' =>'FacultyController',
    'courses'=>'CourseController',
    'department' => 'DepartmentController',
    'user'=>'UserController',
]);


Route::get('/','HomeController@homepage');


