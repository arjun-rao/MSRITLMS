<?php namespace App\Http\Controllers;


use Auth;
use App;
use App\Models\Announcement;
use App\Models\Page;
class HomeController extends Controller {

    /**
     *
     * Handles display of home page and its associated pages.
     *
     */


	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the homepage to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        if (Auth::check()) {
              $page = Page::where('parent_code',null)->where('slug','home')->first();
              $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
              return view('dept.page',['page'=> $page,'announcements'=>$announcements]);

        }
        else
            App::abort(503, 'Unauthorized action.');
	}


    public function homepage()
    {
        if (Auth::check()) {
            $page = Page::where('parent_code',null)->where('slug','home')->first();
            $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
            return view('dept.page',['page'=> $page,'announcements'=>$announcements]);
        }
        else
            App::abort(403, 'Unauthorized action.');
    }

}
