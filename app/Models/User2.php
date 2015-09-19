<?php

class User extends Eloquent
{

public static $rules=array(
'fname'=>'required',
'lname'=>'required',
'year'=>'required',
'email'=>'required|unique:users',
'password'=>'required|min:4'


);

}
?>