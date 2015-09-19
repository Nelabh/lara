<?php 
namespace App\Http\Controllers;
use Views;

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
} 
?>