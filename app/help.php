<?php

use App\User;
use App\Userspaymentsplan;
use Illuminate\Http\Request;

function checklicense($id){
$userspaymentsplan=Userspaymentsplan::where('user_id',$id)->latest('id')->first();
   // return (strtotime($userspaymentsplan->checklicense)< time());
  if(isset($userspaymentsplan)){
      if($userspaymentsplan->checklicense=='cancel'){
          $User = User::findOrFail($id);
//    print_r($User);

          $User->update(['license' =>'false']);

      }
      else if(strtotime($userspaymentsplan->checklicense) < time() ){
          $User = User::findOrFail($id);
//    print_r($User);

          $User->update(['license' =>'false']);
      }
    }

    return 1;
}

function get_user_role($id){
    $user = User::with(['role'])->findOrFail($id);

    $company_json= json_decode($user->role);

    return($company_json[0]->title);
}
function fetch_match_request($primary_id,$secondary_id){
    $main_id=$primary_id;
    $secondary_id=$secondary_id;
    $compatibility_questions=\App\Question::all();

    $personality_match=0;
    $compatibility_match=0;
    $matches_arr1=array();
    $matches_arr2=array();
    $main_personality=\App\Personalityanswer::select('userid','questionid','optionid')
        ->where('userid',$main_id)
        ->get();
    $secondary_personality=\App\Personalityanswer::select('userid','questionid','optionid')
        ->where('userid',$secondary_id)
        ->get();
    if(count($main_personality)>0 && count($secondary_personality)>0){
        foreach($main_personality as $user_ans){
            $user_questionid=$user_ans['questionid'];
            $user_optionid=$user_ans['optionid'];
            foreach ($secondary_personality as $mem_ans){
                $id=$mem_ans['id'];
                $mem_questionid=$mem_ans['questionid'];
                $mem_optionid=$mem_ans['optionid'];
                if($user_questionid===$mem_questionid && $user_optionid===$mem_optionid){
                    $matches_arr1[]=$mem_questionid;
                }
            }
        }
        $ques_length=count($main_personality);
        if(count($matches_arr1)>0){
            $personality_match = round((count($matches_arr1) * 100) / $ques_length);

        }



    }




    $main_compatibility=\App\Answer::select('userid','questionid','optionid')
        ->where('userid',$main_id)

        ->get();
    $secondary_compatibility=\App\Answer::select('userid','questionid','optionid')
        ->where('userid',$secondary_id)
        ->get();
    if(count($main_compatibility)>0 && count($secondary_compatibility)>0){
        foreach($main_compatibility as $user_ans_c){

            $user_questionid_c = $user_ans_c['questionid'];
            $user_optionid_c = $user_ans_c['optionid'];

            foreach ($secondary_compatibility as $mem_ans_c) {

                $id = $mem_ans_c['userid'];
                $mem_questionid_c = $mem_ans_c['questionid'];
                $mem_optionid_c = $mem_ans_c['optionid'];
                if ($user_questionid_c === $mem_questionid_c && $user_optionid_c === $mem_optionid_c) {
                    $matches_arr2[] = $id;
                }
            }

        }

        $compatibility_match = round((count($matches_arr2) * 100) / count($compatibility_questions));




    }

    $return_arr=array('personality'=>$personality_match,'compatibility'=>$compatibility_match,'viewedme'=>
        \App\Whoviewme::where('userid',$main_id)->where('memberid',$secondary_id)->first());


    return $return_arr;



}
function get_mail_content($user_name,$content,$match_user_data){

    $logo=url('/').'/images/logo.png';
    $new_html= '<div class=""><div class="aHl"></div><div id=":1ux" tabindex="-1">';
    $new_html.= '</div><div id=":1wl" class="ii gt"><div id=":1wm" class="a3s aiL ">';
    $new_html.= '<table style="max-width:420px;margin:0 auto;font-size:17px;font-family:arial;width:100%">';
    $new_html.= '<thead>';
    $new_html.= '<tr>';
    $new_html.= '<th><img src="'.$logo.'" style="margin-bottom:35px" class="CToWUd" width="180"></th>';
    $new_html.= '</tr>';
    $new_html.= '</thead>';
    $new_html.= '<tbody>';
    $new_html.= '<tr>';
    $new_html.= '<td style="color:#666;padding:5px 10px"><h2 style="margin:0">Hi '.$user_name.',<br>'.$content.'</h2></td>';
    $new_html.= '</tr>';
    $new_html.= '<tr>';
    $new_html.= '<td style="padding:5px 10px"><img style="height:100px;width:100px" src="'.$match_user_data['profile_pic'].'" class="CToWUd"></td>';
    $new_html.= '</tr>';
    $new_html.= '<tr>';
    $new_html.= '<td style="padding:5px 10px" valign="top">';
    $new_html.= '<p style="color:#666;font-size:17px"><span style="color:#ca333e;font-size:28px">'.$match_user_data['name'].'</span>';
    $new_html.= '<span style="color:#4f4f4f;font-size:21px">,'.$match_user_data['age'].'</span><br>Lives in '.$match_user_data['city'].','.$match_user_data['country'].' </p>';
    $new_html.= '<div style="background:#ca333e;padding:20px;text-align:center">';
    $new_html.= '<a href="#" style="border:2px solid #fff;border-radius:5px;color:#fff;display:inline-block;font-size:17px;font-weight:400;padding:10px 35px;text-decoration:none" target="_blank" data-saferedirecturl="">';
    $new_html.= 'See his profile';
    $new_html.= '</a>';
    $new_html.= '</div>';
    $new_html.= '</td>';
    $new_html.= '</tr>';
    $new_html.= '</tbody>';
    $new_html.= '</table>';
    $new_html.= '</div><div class="yj6qo">';
    $new_html.= '</div></div><div id=":1uu" class="ii gt" style="display:none"><div id=":1ur" class="a3s aiL undefined"></div></div><div class="hi">';
    $new_html.= '</div></div>';

    return $new_html;

}

