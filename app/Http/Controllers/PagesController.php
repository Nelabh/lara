<?php 
namespace App\Http\Controllers;
use Views;
use DB;
use Illuminate\Routing\Controller as BaseController;


class PagesController extends BaseController {
	public function home()
	{
		return \View::make('index');
	}
	public function signup()
	{
		return \View::make('signup');
	}

	public function login()
	{
		return \View::make('login');
	}

	public function leaderboard($id){
		switch ($id) {
			case 0:
				$global = Db::table('users')->orderBy('level','desc')->select('email')->get();
				return $global;
				break;
			
			case 1:
			case 2:			
			case 3:
				$global = Db::table('users')->where('year', (string)$id)->orderBy('level','desc')->select('email')->get();
				return $global;
				break;
				
			// global leaderboard	
			default:
				$global = DB::table('users')->orderBy('level','desc')->select('email')->get();
				$board = [];
				foreach($global as $x){
					array_push($board, $x -> email);
				}
				return \View::make('leaderboard', array('data'=>['load' => 'true', 'emails' => $board]));
		}	

	}
} 
?>