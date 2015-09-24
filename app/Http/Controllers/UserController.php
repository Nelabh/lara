<?php 
namespace App\Http\Controllers;
use Views;
use App\Models\User;
use Input;
use Session;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;
use Illuminate\Validation;
use Illuminate\Support\Facades\Redirect;
 
class UserController extends BaseController {
	protected $fillable = array('fname','lname','year', 'email', 'password');       
	public function  login()
	{
		$user=array(
			'email'=>Input::get('email'),
			'password'=>Input::get('password')
			);

		if(\Auth::attempt($user))
		{
			Session::put('user_name', $user['email']);
			return Redirect::to('dashboard')->with('message','Successfully Logged In!');
		}
		else{
			return Redirect::to('login')->with('message','Your email/password combination is incorrect!')->withInput();

		}
	}
	public function  signup()
	{
		$validation=User::validate(Input::all());
		if($validation->passes())
		{
			$user = array(
				'fname'=>Input::get('fname'),
				'lname'=>Input::get('lname'),	
				'year'=>Input::get('year'),
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password')));
			User::create($user);
			$user_sign=User::whereemail(Input::get('email'))->first();
			\Auth::login($user_sign);
			Session::put('user_name', $user['email']);
			return Redirect::to('dashboard')->with('message','Successfully Registered! Now you are logged in!');
		}	
		else{
			return Redirect::to('signup')->withErrors($validation->errors())->withInput();
		}
	}
	public function logout()
	{
		if(\Auth::check())
		{
			\Auth::logout();
			Session::forget('user_name');
			return Redirect::to('/')->with('message','Successfully Logged Out!'); 
		}
		else
		{
			return Redirect::to('login')->with('message','You need to login first!'); 
		}
	}
} 
?>
