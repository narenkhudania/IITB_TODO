<?php

namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$projects = Crud::all();
        return view('home')->with( 'projects', $projects );
    }
	public function create(Request $request)
    {
		$create_post =  Crud::create([
        'post_name' => $request->post_name,
        'urgency'  => $request->urgency,
        ]);
	
	 if($create_post){
		return back();
		  }else{
			return back();  
		  }

    }
	public function update()
    {
		
        return view('home');
    }

	public function destroy($postID){
	$item = Crud::where('id', $postID);
	$item->delete();
	return redirect()->route('home');

}
}
