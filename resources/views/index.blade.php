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
<div class="container-fluid">
            <div class="row content">
                <div class="col-md-12">
                    <h1>TECH-TREK</h1>
                </div>
                <div class="col-md-12">
                    <h4>One board, Two roads !</h4>
                </div>
                <div class="col-md-6">  <button type="button"  id="log" class="button button--wayra button--border-thick button--text-upper button--size-s" onclick="return logclick()">Login</button></div>
                
                 <div class="col-md-6"><button type= "button" id="sign" class="button button--wayra button--border-thick button--text-upper button--size-s" onclick="return signclick()">Sign Up</button>   </div>  
                <div class="col-md-12"><span class="image">
            <img src="common/assets/img/boy.PNG">
            </span>
                </div>
            </div>
        </div>
@stop