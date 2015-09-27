@extends('common.default')



@section('content')
<script language="javascript" type="text/javascript">
function signclick() 
{
    window.location = window.location.href+"signup";
}
function logclick() 
{
    window.location = window.location.href+"login";
}
</script>
<div class="container-fluid background">
            <div class="row content">
                <div class="col-md-6 col-md-offset-3">
                    <h1>TECH-TREK</h1>
                </div>
                <div class="col-md-12">
                    <h4>One board, Two roads !</h4>
                </div>
              
 
                <div class="col-md-offset-4 col-md-2 col-xs-12">  <button type="button"  id="log" class="button button--wayra button--border-thick button--text-upper button--size-s" onclick="return logclick()">Login</button></div>
                
                 <div class="col-md-6"><button type= "button" id="sign" class="button button--wayra button--border-thick button--text-upper button--size-s" onclick="return signclick()">Sign Up</button>   </div>  
            </div>
        </div>
@stop