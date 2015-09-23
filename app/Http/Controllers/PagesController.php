<?php 
namespace App\Http\Controllers;
use Views;
use DB;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Input;
use Illuminate\Validation\Validator;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;


class PagesController extends BaseController {
	public function home()
	{
		if(\Auth::check())
		{
			return \View::make('dashboard');	
		}
	else{
			return \View::make('index');
		}
	}
	public function signup()
	{
		if(\Auth::check())
		{
			return Redirect::to('dashboard')->with('message','You need to log out first!');	
		}
	else{
			return \View::make('signup');
		}

	}

	public function login()
	{
		if(\Auth::check())
		{
			return Redirect::to('dashboard')->with('message','You are already logged in!');	
		}
	else{
			return \View::make('login');
		}
			}
	public function dashboard()
	{
		if(!\Auth::check())
		{
			return Redirect::to('login')->with('message','You need to login first!'); 
		}
		else
		{
			$data = array('user' =>['name' => 'Abhay','level'=>'2' ,'globalRank' => '1' , 'question' => 'something...']);
			return \View::make('dashboard', $data);
		}
	}

	public function answer($ans){

	}

	public function leaderboard($id){
		switch ($id) {
			case 0:
				$global = Db::table('users')->orderBy('points','desc')->select('email')->get();
				return $global;
				break;
			
			case 1:
			case 2:			
			case 3:
				$global = Db::table('users')->where('year', (string)$id)->orderBy('points','desc')->select('email')->get();
				return $global;
				break;
				
			// global leaderboard	
			default:
				$global = DB::table('users')->orderBy('points','desc')->select('email')->get();
				$board = [];
				foreach($global as $x){
					array_push($board, $x -> email);
				}
				return \View::make('leaderboard', array('data'=>['load' => 'true', 'emails' => $board]));
		}	

	}
} 
?>