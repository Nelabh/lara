<?php 
namespace App\Http\Controllers;
use DB;
use Input;
use Session;
use Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class AnswersController extends BaseController{
	public function check(){
		if (Request::ajax()) {
            $data = Input::all();
            $fuckinans = $data['value'];
            $user_name = Session::get('user_name');
            $curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
            $curr_level = $data['level'];
            if($curr_level <= $curr_user_level){
				/*
            	level of question to be started from 0...
            	level 0 questio will be a dummy question and the user wuld not be awarded any points for answering it....
				$score_trail = DB::table('users')->where('email', $user_name)->pluck('score_trail');
				*/
            	$score = DB::table('users')->where('email', $user_name)->pluck('points');
                $ans_a = DB::table('questions')->where('level', $curr_level)->pluck('a');
                $ans_b = DB::table('questions')->where('level', $curr_level)->pluck('b');
                if($fuckinans == $ans_a){
                	/*
                	$score_trail = substr($score_trail, 0, $curr_level) . '1' ;
                	DB::table('users')->where('email', $user_name)->update(['score_trail' = $score_trail]);
					*/
                	DB::table('users')->where('email', $user_name)->increment(['points' , 5]);
                	DB::table('users')->where('email', $user_name)->increment(['level' , 1]);
                	$score = $score + 5;
                	update();

                }else if($fuckinans == $ans_b){
                	/*
                	if(curr_level<curr_user_level)
                		$score_trail = substr($score_trail, 0, $curr_level) . '2' . substr($score_trail, $curr_level+1);
                	else
                		$score_trail = substr($score_trail, 0, $curr_level) . '2' ;
                	DB::table('users')->where('email', $user_name)->update(['score_trail' = $score_trail]);
                	*/
                	DB::table('users')->where('email', $user_name)->increment(['points' , 10]);
                	DB::table('users')->where('email', $user_name)->increment(['level' , 1]);
                	$score = $score + 10;
                	update();
                	
                }else{
    				return 'Hard Luck';
                }
            }


        }

	}

	public function update(){
		$user_name = Session::get('user_name');
		$curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
  		$question = DB::table('question')->where('level', $curr_user_level);

  		return '??asmdkajs';
	}

	public function navigate($lvl){
		$user_name = Session::get('user_name');
		$curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
		if($lvl <= $curr_user_level){
			$question = DB::table('question')->where('level', $lvl);
			return $question;
		}
	}
    public function globrank()
    {
        $user_name = Session::get('user_name');
        $pts=DB::table('users')->where('email', $user_name)->pluck('points');
        //$glorank=DB::table('users')->select(DB::raw('count(email)'))->where()
        $glorank=DB::table('users')->where('points','>=',$pts)->count();
        return $glorank;
    }
}

?>