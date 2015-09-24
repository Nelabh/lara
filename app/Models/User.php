<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Basemodel implements AuthenticatableContract, AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
 protected $fillable = ['fname','lname','year', 'email', 'password','points','level','score_trail'];
public static $rules=array(
'fname'=>'required|min:4|alpha_dash',
'lname'=>'required|alpha_dash',
'year'=>'required',
'email'=>'required|unique:users',
'password'=>'required|min:4|confirmed',
'password_confirmation'=>'required|min:4'
);

}
?>