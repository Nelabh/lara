@extends('common.default')



@section('content')
<div class="container-fluid" id="background-2">
         <div class="row content">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="animated fadeInDown">TECH-TREK</h1>
                </div>
                </div>
                <div class="row content">
                <div class="col-md-12">
                    <h4>One board, Two roads !</h4>
                </div>
              </div>
              <div class="row content">
                <div class="col-md-12">

                    {!!Form::open(array('url'=>'log', 'class'=>'signup' ))!!}
                    
                         {!!Form::token()!!}
                                        @if(Session::has('message'))
               <div class="signup-form" id="error">
           
            <p id="msg">{{Session::get('message')}}</p>
           
        </div>
         @endif
 
                        <div class="signup-form col-md-offset-4 col-md-2"> <p>Email-Id</p>{!! Form::email('email', Input::old('email'), array('required','placeholder'=>'hello@gmail.com')) !!}</div>
                        <div class="signup-form col-md-3"> <p>Password</p>{!! Form::password('password',array('required','placeholder'=>'*******')) !!}</div> 
                  <div class="col-md-offset-5 col-md-2 login">{!! Form::button('Login',array('class'=>'button button--wayra button--border-thick button--text-upper button--size-s','type'=>'submit')) !!}</div>  

                    {!! Form::close() !!}
                
                </div>
              </div>
				
	                
        
</div>
@stop

