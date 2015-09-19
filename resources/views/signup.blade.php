@extends('common.default')



@section('content')
<script>
function SetSel(elem)
{
  var elems = document.getElementsByClassName("chkclass");
  var currentState = elem.checked;
  var elemsLength = elems.length;
  //alert(elemsLength);
  for(i=0; i<elemsLength; i++)
  {
    if(elems[i].type === "checkbox")
    {
      //alert(elems[i].className);
       elems[i].checked = false;   
    }
  }
  
  elem.checked = currentState;
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
                <div class="col-md-12">
                    <form class="signup">
                        <span class="signup-form "> <p>First Name</p><input type="text" placeholder="Eg: Spartan"></span> 
                        <span class="signup-form "> <p>Last Name</p><input type="text" placeholder="Eg: Sparta"></span>
                        <span class="signup-form "> <p>Email-Id</p><input type="text" placeholder="hello@gmail.com"></span>
                        <span class="signup-form "> <p>Password</p><input type="password" placeholder="*******"></span> 
                        <span class="signup-form"> <p>Confirm Password</p><input type="password" placeholder="*******"></span>
                        <span class="signup-form"> <p>Year</p>
                    <input type="checkbox" id="1" class="chkclass" value="1" onclick="SetSel(this);">
                    <label for="1">1</label>
                    <input type="checkbox" id="2" class="chkclass" value="2" onclick="SetSel(this);">
                    <label for="2">2</label>
                    <input type="checkbox" id="3" class="chkclass" value="3" onclick="SetSel(this);">
                    <label for="3">3</label>  
                    <input type="checkbox" id="4" class="chkclass" value="4" onclick="SetSel(this);">
                    <label for="4">4</label>
                    </span>
                    <div class="col-md-6"><button type= "submit" class="button button--wayra button--border-thick button--text-upper button--size-s">Sign Up</button>   </div>  
                    </form>
                
                </div>
                
    
                <div class="col-md-12"><span class="image">
            <img src="common/assets/img/boy.PNG">
            </span>
                </div>
            </div>
        </div>
@stop

