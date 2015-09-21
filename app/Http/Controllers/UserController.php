<?php 
namespace App\Http\Controllers;
use Views;
use App\Models\User;
use Input;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;
use Illuminate\Validation;

class UserController extends BaseController {
	
	public function  login()
	{
		return 'loggedin';
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
				'password'=>Hash::make(Input::get('password'))

				));
			return Redirect::to_route('home')->with('message','Successfully Regisered');
		}	
		else{
			return Redirect::to_route('signup')->with_errors($validation)->with_input();
		}
	}
} 
?>
