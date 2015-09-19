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
                    <form class="signup">
                        <span class="signup-form "> <p>Email-Id</p><input type="text" placeholder="hello@gmail.com"></span>
                        <span class="signup-form "> <p>Password</p><input type="password" placeholder="*******"></span> 
                  <div class="col-md-6"><button type= "submit" class="button button--wayra button--border-thick button--text-upper button--size-s">Login</button>   </div>  

                    </form>
                
                </div>
				
	                <div class="col-md-12"><span class="image">
            <img src="common/assets/img/boy.PNG">
            </span>
             </div>
        </div>
</div>
@stop

