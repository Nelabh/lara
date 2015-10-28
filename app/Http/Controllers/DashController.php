<?php 
namespace App\Http\Controllers;
use DB;
use Input;
use View;
use Session;
use Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class DashController extends BaseController{
    public function check(){
        if (Request::ajax()){
            $data = Input::all();
            $fuckinans = $data['value'];
            $user_name = Session::get('user_name');
            $curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
            $curr_level = $data['level'];
            $score_trail = DB::table('users')->where('email', $user_name)->pluck('score_trail');
            $score = DB::table('users')->where('email', $user_name)->pluck('points');
            $ans_b = DB::table('questions')->where('level', $curr_level)->pluck('a');
            $ans_a = DB::table('questions')->where('level', $curr_level)->pluck('b');
            $maxlev = DB::table('questions')->count();
            $message = '';
            if($maxlev<$curr_user_level){
          	  return ['status'=>'2'];
            }
              
                $status = 0;
                if($curr_level < $curr_user_level){
                    if($fuckinans == $ans_a){
                        switch (substr($score_trail, $curr_level, 1)) {
                            case '1':
                                $message = 'You have already given this answer... Try something new!';
                                break;

                            default :
                                $message = 'Did you really think it would work?!!';
                                break;
                        }
                    }else if($fuckinans == $ans_b){
                        switch (substr($score_trail, $curr_level, 1)) {
                            case '1':
                                $message = 'Correct answer!!';
                                $status = 1;
                                DB::table('users')->where('email', $user_name)->increment('points' , 5);
                                $score_trail = substr($score_trail, 0, $curr_level).'2'.substr($score_trail, $curr_level+1);
                                DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]);
                                $question = DB::table('questions')->where('level', ($curr_level + 1))->pluck('question');
                                break;

                            case '2':
                                $message = 'You have already bragged the max points for this question';
                                break;
                        }
                    }else{
                        $message = 'Wrong answer... Try again!!11';
                    }
                }else if($curr_level == $curr_user_level){
                    switch ($fuckinans) {
                        case $ans_a:
                            DB::table('users')->where('email', $user_name)->increment('points' , 5);
                            DB::table('users')->where('email', $user_name)->increment('level' , 1);
                            $score_trail = substr($score_trail, 0, $curr_level) . '1' ;
                            DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]);
                            $question = DB::table('questions')->where('level', ($curr_user_level + 1))->pluck('question');
                            $message = 'Correct answer!!';
                            $status = 1;
                            break;
                        case $ans_b;
                            DB::table('users')->where('email', $user_name)->increment('points' , 10);
                            DB::table('users')->where('email', $user_name)->increment('level' , 1);
                            $score_trail = substr($score_trail, 0, $curr_level) . '2' ;
                            DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]); 
                            $question = DB::table('questions')->where('level', ($curr_user_level + 1))->pluck('question');
                            $message = 'Correct answer!!';
                            $status = 1;
                            break;
                        
                        default:
                            $message = 'Wrong answer... Try again!!..';
                            break; 
                    }
                    
          
                }else{
                    $message = 'Did you really think it would work?!!!';
                }

                $glorank = DB::table('users')->where('points','>=',$score)->count();

                if($status == 1){
                    $score = DB::table('users')->where('email', $user_name)->pluck('points');
                    /*if($curr_user_level +1 == 19 && $score < 140){
                    	return \View::make('next');
                    }*/
                    return ['status' => '1' , 'ques' => $question, 'score' => $score, 'rank' => $glorank, 'scrtrl'=>$score_trail, 'message' => $message];
                }else{
                    return ['status' => '0' , 'rank' => $glorank, 'message' => $message ,'ans'=> $ans_a ];
                }

            }
        }
    

    public function navigate($lvl){
   	
        $user_name = Session::get('user_name');
        $curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
        if($lvl <= $curr_user_level){
            $question = DB::table('questions')->where('level', $lvl)->pluck('question');
            $trail = DB::table('users')->where('email', $user_name)->pluck('score_trail');
            return ['ques'=>$question, 'trail'=> $trail];
        }
    }


    public function globrank(){
        $user_name = Session::get('user_name');
        $pts = DB::table('users')->where('email', $user_name)->pluck('points');
        $glorank = DB::table('users')->where('points','>=',$pts)->count();
        return $glorank;
    }
    
    public function wait(){
	 return \View::make('wait');
	}
}

?>