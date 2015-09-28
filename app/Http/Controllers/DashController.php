<?php 
namespace App\Http\Controllers;
use DB;
use Input;
use Session;
use Request;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class DashController extends BaseController{
	public function check(){
		if (Request::ajax()) {
            $data = Input::all();
            $fuckinans = $data['value'];
            $user_name = Session::get('user_name');
            $curr_user_level = DB::table('users')->where('email', $user_name)->pluck('level');
            $curr_level = $data['level'];
            if($curr_level <= $curr_user_level){

				$score_trail = DB::table('users')->where('email', $user_name)->pluck('score_trail');
				
            	$score = DB::table('users')->where('email', $user_name)->pluck('points');
                $ans_a = DB::table('questions')->where('level', $curr_level)->pluck('a');
                $ans_b = DB::table('questions')->where('level', $curr_level)->pluck('b');

                if($fuckinans == $ans_a){
                    
                    if(substr($score_trail, $curr_level, 1) == '0'){   
                    	$score_trail = substr($score_trail, 0, $curr_level) . '1' ;
                    	DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]);
    					$score = $score + 5;
                        $question = DB::table('questions')->where('level', ($curr_user_level + 1))->pluck('question');
                        DB::table('users')->where('email', $user_name)->increment('points' , 5);
                        DB::table('users')->where('email', $user_name)->increment('level' , 1);
                        $glorank = DB::table('users')->where('points','>=',$score)->count();
                        return ['status' => '1' , 'ques' => $question, 'score' => $score, 'rank' => $glorank, 'scrtrl'=>$score_trail];
                    }else if(substr($score_trail, $curr_level, 1) == '1'){
                        $glorank = DB::table('users')->where('points','>=',$score)->count();
                        return ['status' => '0','rank' => $glorank ,"message" => 'You have already tried this answer!', 'scrtrl'=>$score_trail];
                    }else{

                    }                    
                    

                }else if($fuckinans == $ans_b){
                    if(substr($score_trail, $curr_level, 1) == '0'){
                    	if($curr_level < $curr_user_level)
                    		$score_trail = substr($score_trail, 0, $curr_level) . '2' . substr($score_trail, $curr_level+1);
                    	else
                    		$score_trail = substr($score_trail, 0, $curr_level) . '2' ;
                    	DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]);
                    	
                        $score = $score + 10;
                        $question = DB::table('questions')->where('level', ($curr_user_level + 1))->pluck('question');
                    	DB::table('users')->where('email', $user_name)->increment('points' , 10);
                    	DB::table('users')->where('email', $user_name)->increment('level' , 1);
                        $glorank = DB::table('users')->where('points','>=',$score)->count();
                        return ['status' => '1' , 'ques' => $question, 'score' => $score, 'rank' => $glorank, 'scrtrl'=>$score_trail];
                    }else if(substr($score_trail, $curr_level, 1) == '1'){
                        if($curr_level < $curr_user_level)
                            $score_trail = substr($score_trail, 0, $curr_level) . '2' . substr($score_trail, $curr_level+1);
                        else
                            $score_trail = substr($score_trail, 0, $curr_level) . '2' ;
                        DB::table('users')->where('email', $user_name)->update(['score_trail' => $score_trail]);
                        
                        $score = $score + 5;
                        $question = DB::table('questions')->where('level', ($curr_user_level + 1))->pluck('question');
                        DB::table('users')->where('email', $user_name)->increment('points' , 5);
                        $glorank = DB::table('users')->where('points','>=',$score)->count();
                        return ['status' => '1' , 'ques' => $question, 'score' => $score, 'rank' => $glorank, 'scrtrl'=>$score_trail];
                    }
                	
                }else{
                    $glorank = DB::table('users')->where('points','>=',$score)->count();
    				return ['status' => '0', 'rank' => $glorank];
                }
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


    public function globrank()
    {
        $user_name = Session::get('user_name');
        $pts = DB::table('users')->where('email', $user_name)->pluck('points');
        $glorank = DB::table('users')->where('points','>=',$pts)->count();
        return $glorank;
    }
}

?>