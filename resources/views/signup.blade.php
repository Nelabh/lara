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
                @if($errors->has())
                <p>Following Errors Occured:</p>
                <ul id="form-errors">
                  {{$errors->first('fname','<li>:message</li>')}}
                  {{$errors->first('lname','<li>:message</li>')}}
                  {{$errors->first('year','<li>:message</li>')}}
                  {{$errors->first('email','<li>:message</li>')}}
                  {{$errors->first('password','<li>:message</li>')}}
                  {{$errors->first('password_confirmation','<li>:message</li>')}}
                </ul>
                @endif

                <div class="col-md-12">
                    {!!Form::open(array('url'=>'sign', 'class'=>'signup' ))!!}
                    {!!Form::token()!!}
                    
                        <span class="signup-form "> <p>First Name</p>{!! Form::text('fname', Input::old('fname'), 
        array('required',  
              'placeholder'=>'Eg: Spartan')) !!}</span> 
                        <span class="signup-form "> <p>Last Name</p>{!! Form::text('lname', Input::old('lname'), 
        array('required',  
              'placeholder'=>'Eg: Sparta')) !!}</span>
                        <span class="signup-form "> <p>Email-Id</p>{!! Form::email('email', Input::old('email'), 
        array('required',  
              'placeholder'=>'hello@gmail.com')) !!}</span>
                        <span class="signup-form "> <p>Password</p>{!! Form::password('password',array('required','placeholder'=>'*******')) !!}</span> 
                        <span class="signup-form"> <p>Confirm Password</p>{!! Form::password('password_confirmation',array('required','placeholder'=>'*******')) !!}</span>
                        <span class="signup-form"> <p>Year</p>
                          {!!Form::checkbox('year', 1, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'1'])!!}
                    <label for="1">1</label>
                     {!!Form::checkbox('year', 2, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'2'])!!}
                    <label for="2">2</label>
                     {!!Form::checkbox('year', 3, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'3'])!!}
                    <label for="3">3</label>  
                     {!!Form::checkbox('year', 4, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'4'])!!}
                    <label for="4">4</label>
                    </span>
                    <div class="col-md-6">{!! Form::button('Sign Up', 
      array('class'=>'button button--wayra button--border-thick button--text-upper button--size-s','type'=>'submit')) !!}   </div>  
                    </form>
                
                </div>
                
    
                <div class="col-md-12"><span class="image">
            <img src="common/assets/img/boy.PNG">
            </span>
                </div>
            </div>
        </div>
@stop

