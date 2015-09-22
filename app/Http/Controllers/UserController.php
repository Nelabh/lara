<?php 
namespace App\Http\Controllers;
use Views;
use App\Models\User;
use Input;
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
			return Redirect::to('/')->with('message','Successfully Logged In!');
		}
		else{
			return Redirect::to('login')->with('message','Your email/password combination is incorrect!')->withInput();;

		}
	}
	public function  signup()
	{
		$validation=User::validate(Input::all());
		if($validation->passes())
		{
			User::create(array(
				'fname'=>Input::get('fname'),
				'lname'=>Input::get('lname'),	
				'year'=>Input::get('year'),
				'email'=>Input::get('email'),
				'password'=>\Hash::make(Input::get('password'))

				));
			return Redirect::to('/')->with('message','Successfully Regisered!');
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
			return Redirect::to('/')->with('message','Successfully Logged Out!'); 
		}
		else
		{
			return Redirect::to('login')->with('message','You need to login first!'); 
		}
	}
} 
?>
