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
  <div class="container-fluid " id="background">
            <div class="row content">
                <div class="col-md-12">
                    <h1 class="animated fadeInDown">TECH-TREK</h1>
                </div>
              </div>
              <div class="row content">
                <div class="col-md-12">
                    <h4>One board, Two roads !</h4>
                </div>
              </div>
                
                <div class="row content">
                <div class="col-md-12 form-container">
                  
                    {!!Form::open(array('url'=>'sign', 'class'=>'signup' ))!!}
                    {!!Form::token()!!}
                    
                    <div class="signup-form" id="error">
                @if($errors->has())
                <p>
                  {{$errors->first('fname',':message')}} </p>
                <p>  {{$errors->first('lname',':message')}} </p>
                <p>  {{$errors->first('year',':message')}} </p>
                <p>  {{$errors->first('email',':message')}} </p>
                <p>  {{$errors->first('password',':message')}} </p>
                <p>  {{$errors->first('password_confirmation',':message')}} </p>
                 
                  @endif
               </div>
                        <div class="signup-form "> <p>First Name</p>{!! Form::text('fname', Input::old('fname'), 
        array('required',  
              'placeholder'=>'Eg: Spartan')) !!}</div> 
                        <div class="signup-form "> <p>Last Name</p>{!! Form::text('lname', Input::old('lname'), 
        array('required',  
              'placeholder'=>'Eg: Sparta')) !!}</div>
                        <div class="signup-form "> <p>Email-Id</p>{!! Form::email('email', Input::old('email'), 
        array('required',  
              'placeholder'=>'hello@gmail.com')) !!}</div>
                        <div class="signup-form "> <p>Password</p>{!! Form::password('password',array('required','placeholder'=>'*******')) !!}</div> 
                        <div class="signup-form"> <p>Confirm Password</p>{!! Form::password('password_confirmation',array('required','placeholder'=>'*******')) !!}</div>
                        <div class="signup-form"> <p>Year</p>
                          <div class="col-md-offset-5">
                          <div class="check">
                          {!!Form::checkbox('year', 1, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'1'])!!}
                    <label for="1">1</label>
                     {!!Form::checkbox('year', 2, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'2'])!!}
                    <label for="2">2</label>
                     {!!Form::checkbox('year', 3, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'3'])!!}
                    <label for="3">3</label>  
                     {!!Form::checkbox('year', 4, null, ['class' => 'chkclass','onclick'=>'SetSel(this)','id'=>'4'])!!}
                    <label for="4">4</label>
                    </div>
                  </div>
                  </div>
                    <div class="col-md-offset-5 col-md-2 div-button">{!! Form::button('Sign Up',array('class'=>'button button--wayra button--border-thick button--text-upper button--size-s','type'=>'submit')) !!}   </div>  
                    </form>
                
                </div>
              </div>
                
    
                
            </div>
       
@stop

