@extends('common.default')



@section('content')
<div class="container-fluid">
         <div class="row content">
                <div class="col-md-12">
                    <h1>TECH-TREK</h1>
                </div>
                <div class="col-md-12">
                    <h4>One board, Two roads !</h4>
                </div>
                <div class="col-md-12">
                    {!!Form::open(array('url'=>'login', 'class'=>'signup' ))!!}
                    
                         {!!Form::token()!!}
                        <span class="signup-form "> <p>Email-Id</p>{!! Form::email('email', Input::old('email'), 
        array('required',  
              'placeholder'=>'hello@gmail.com')) !!}</span>
                        <span class="signup-form "> <p>Password</p>{!! Form::password('pass',array('required','placeholder'=>'*******')) !!}</span> 
                  <div class="col-md-6">{!! Form::button('Login', 
      array('class'=>'button button--wayra button--border-thick button--text-upper button--size-s','type'=>'submit')) !!}</div>  

                    {!! Form::close() !!}
                
                </div>
				
	                <div class="col-md-12"><span class="image">
            <img src="common/assets/img/boy.PNG">
            </span>
             </div>
        </div>
</div>
@stop

