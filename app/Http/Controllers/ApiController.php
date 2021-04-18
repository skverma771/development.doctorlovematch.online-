<?php
namespace App\Http\Controllers;


use App\Blockuser;
use App\Message;
use App\Messageconection;
use App\reportaproblem;
use App\reportimage;
use App\Userspaymentsplan;
use DateTime;
use App\City;
use App\Role;
use App\Country;
use App\State;
use App\User;
use App\Astrologycalc;
use App\Astrologycalcsign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Personalityoption;
use App\Personalityquestion;
use App\Personalityanswer;
use App\Question;
use App\Questionoption;
use App\Answer;
use Illuminate\Support\Facades\DB;
use App\Usernotification;
use App\Whoviewme;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mockery\Undefined;


class ApiController extends Controller
{

    public function  reportimage(Request $request){
        reportimage::create(['user_id'=>$request['id'],'image_url'=>$request['url'],'member_id'=>$request['member_id'],'type'=>'image']);

    }
    public function  reportproblem(Request $request){

        reportaproblem::create(['problem'=>$request['problem'], 'user_id'=>$request['id']]);
    }

    public function cancel(Request $request){

        $userspaymentsplan=Userspaymentsplan::where('user_id',$request['id'])->latest('id')->first();
        $userspaymentsplan->update(['expire_date' =>'cancel']);

    }

    public function create_account(Request $request){

        $email=$request['email'];

        $data=User::where('email',$email)->get();
        $todayDate = date("Y-m-d");
        $from = new DateTime($request['dob']);
        $to   = new DateTime($todayDate);
        $image='{"profile":"","gallery":[]}';
        if($request['gender']==='Male'){
            $image='{"profile":"/storage/10/female.jpg","gallery":[]}';
        }
        elseif($request['gender']==='Female') {
            $image = '{"profile":"/storage/10/female.jpg","gallery":[]}';
        }
        $rules = ['captcha' => 'required|captcha_api:'. request('6LdpkU8aAAAAAAvhlY2dew1-jhRfBah74U64X2QS') . ',default'];
//        $validatedData = $request->validate([
//            'captcha' =>$rules,
//
//        ]);
//print_r($validatedData);

        if(count($data)==0){
            $u=User::create([
                'name' => $request['uname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'dob' => $request['dob'],
                'gender' => $request['gender'],
                'lookingfor' => $request['looking_for'],
                'ethnicity' => $request['ethnicity'],
                'country_id' => $request['country'],
                'state_id' => $request['state'],
                'city_id' => $request['cities'],
                'ntcount' => $from->diff($to)->y,
                'pictures' => $image,
                'block_arr' => [],
            ]);
//        $role_id=Role::select('id')
            $u->role()->sync(["3"],[]);

            $data=array('email'=>$request['email'],'name'=>$request['name']);

            //disabled for development as smtp not working here
//                Mail::send('welcome_mail', [], function ($message) use($data)
//    {
//        $message->to($data['email'], $data['name'])->subject('Welcome to Dr Love Match');
//
//    });

            return 'success';
        }
        else{
            return 'exist';
        }



    }
    public function fetch_states(Request $request){
        $country_id=$request['country'];
        $state_id=$request['state'];
        $source=$request['source'];
        if($source=='1'){
            return $states=State::select('id','name')->where('country_id',$country_id)->get();
        }
        elseif($source=='2'){
            $state=array();
            if($state_id!=''){
                $state=State::where('id',$state_id)->first();
            }

            $states=State::select('id','name')->where('country_id',$country_id)->get();
            $return_arr=array('state'=>$state , 'states'=>$states);
            return $return_arr;
        }




    }
    public function fetch_cities(Request $request){
        $state_id=$request['state'];
        $city_id=$request['city'];
        $source=$request['source'];
        if($source=='1'){
            return $cities=City::select('id','name')->where('state_id',$state_id)->get();
        }
        elseif($source=='2'){


            $city=array();
            if($city_id!=''){
                $city=City::where('id',$city_id)->first();
            }
            $cities=City::select('id','name')->where('state_id',$state_id)->get();
            $return_arr=array('city'=>$city , 'cities'=>$cities);
            return $return_arr;
        }

    }
    public function fetch_country(Request $request){

           $country_id=$request['country'];
            $country=array();
           if($country_id!=''){
                $country=Country::where('id',$country_id)->first();
            }


            $countries=Country::all();
        $return_arr=array('country'=>$country , 'countries'=>$countries);
        return $return_arr;

    }
    public function fetch_zodiac_sign(){
        return $data=Astrologycalc::all();
    }
    public function fetch_zodiac_result(Request $request){
        $signfrom=$request['signfrom'];
        $signto=$request['signto'];

       return $data=Astrologycalcsign::select('description')->where('signfrom',$signfrom)->where('signto',$signto)->first();


    }
    public function personality_question(Request $request){
        $user_id=$request['id'];
        $questions=Personalityquestion::all();
        $options=Personalityoption::all();
        $answers=Personalityanswer::select('id','questionid','optionid')->where('userid',$user_id)->get();
        $answers_counter=count($answers);
        $return_arr=array();
        $return_arr2=array();
        foreach($questions as $ques){
             $id=$ques['id'];
             $ques_option=array();
             foreach ($options as $opt){
                 $filled_ans=array();
                 $optionid=$opt['id'];
                 $option=$opt['options'];
                 $questionid=$opt['questionid'];
                 if($id==$questionid){
                     $checked=0;

                     if(count($answers)>0){

                         foreach($answers as $filled){

                             if($id==$filled['questionid'] && $optionid==$filled['optionid']){
                                 $checked=1;


                             }
                         }
                     }
                     $ques_option[]=array('option_id'=>$optionid,'name'=>$option,'checked'=>$checked);




                 }


             }
            $return_arr[]=array('ques_id'=>$id,'question'=>$ques['question'],'options'=>$ques_option);


        }
        $return_arr2=array('data'=>$return_arr,'filled'=>$answers_counter);
        return $return_arr2;


    }
    public function personality_answers(Request $request){

        $user_id=$request['user_id'];

        $ans_arr=json_decode($request['answers'],true);

         if(count($ans_arr)>0){

             foreach ($ans_arr as $ans ){

                 $db_ans=Personalityanswer::select('id')
                     ->where('userid',$user_id)
                     ->where('questionid',$ans['ques'])
                     ->first();
                 if($db_ans){
                     Personalityanswer::where('userid',$user_id)
                         ->where('questionid',$ans['ques'])
                         ->update(['optionid' =>$ans['ans']]);

                 }
                 else{
                     $post = new Personalityanswer();
                     $post->userid = $user_id;
                     $post->questionid = $ans['ques'];
                     $post->optionid = $ans['ans'];
                     $post->save();
                 }


             }
         }

         return 'success';



    }
    public function compatibility_question(Request $request){
        $user_id=$request['id'];
        $questions=Question::all();
        $options=Questionoption::all();
        $answers=Answer::select('id','questionid','optionid')
            ->where('userid',$user_id)
            ->where('deleted_at',NULL)
            ->get();
        $answers_counter=count($answers);
        $return_arr2=array();
        foreach($questions as $ques){
            $id=$ques['id'];
            $ques_option=array();
            foreach ($options as $opt){
                $filled_ans=array();
                $optionid=$opt['id'];
                $option=$opt['options'];
                $questionid=$opt['questionid'];
                if($id==$questionid){
                    $checked=0;

                    if(count($answers)>0){

                        foreach($answers as $filled){

                            if($id==$filled['questionid'] && $optionid==$filled['optionid']){
                                $checked=1;


                            }
                        }
                    }
                    $ques_option[]=array('option_id'=>$optionid,'name'=>$option,'checked'=>$checked);




                }


            }
            $return_arr[]=array('ques_id'=>$id,'question'=>$ques['questions'],'questions_type'=> $ques['questions_type'],'options'=>$ques_option);


        }

        $return_arr2=array('data'=>$return_arr,'filled'=>$answers_counter);
        return $return_arr2;

    }
    public function compatibility_answers(Request $request){

        $user_id=$request['user_id'];

        $ans_arr=json_decode($request['answers'],true);

        if(count($ans_arr)>0){

            foreach ($ans_arr as $ans ){

                if($ans['ques_type']==1){

                      $db_ans=Answer::select('id')
                    ->where('userid',$user_id)
                        ->where('questionid',$ans['ques'])
                        ->where('deleted_at',NULL)
                        ->get();
                    if(count($db_ans)){
                        foreach ($db_ans as $database_ans){
                            Answer::where('id',$database_ans['id'])
                                ->delete();
                        }
                    }

                }

                }
            }
            foreach ($ans_arr as $ans ){

                if($ans['ques_type']==1){

                    $post = new Answer();
                    $post->userid = $user_id;
                    $post->questionid = $ans['ques'];
                    $post->optionid = $ans['ans'];
                    $post->save();

                }
                else{
                    $db_ans=Answer::select('id')
                        ->where('userid',$user_id)
                        ->where('questionid',$ans['ques'])
                        ->where('deleted_at',NULL)
                        ->first();
                    if($db_ans){
                        Answer::where('userid',$user_id)
                            ->where('questionid',$ans['ques'])

                            ->update(['optionid' =>$ans['ans']]);

                    }
                    else{
                        $post = new Answer();
                        $post->userid = $user_id;
                        $post->questionid = $ans['ques'];
                        $post->optionid = $ans['ans'];
                        $post->save();
                    }




            }
        }

        return 'success';



    }
    public function fetch_all_members(){
        $check_user=User::with(['country','city'])
            ->select('id','name','pictures','ntcount','country_id','city_id')->whereHas('role', function ($user) {
            $user->where('title', '=','subscriber');
        })->get();
        $users=DB::table('role_user')->select('user_id') ->where('role_id','3')->get();

        $query = DB::table('users');
        $query->join('countries', 'users.country_id', '=', 'countries.id');
        $query->join('cities', 'users.city_id', '=', 'cities.id');
        $query->select('users.id', 'users.name', 'users.pictures','users.ntcount','users.country_id','users.city_id','countries.name as countryname','cities.name as cityname');
        $query->whereIn('users.id', json_decode($users,true));
//        $query->whereNotIn('users.id', [Auth::id()]);
        return $results = $query->get();


    }
    public function random_members(Request $request){
        $lookingfor=$request['lookingfor'];
        if($lookingfor) {
          return User::with(['country','city'])->inRandomOrder()->select('id', 'name', 'pictures','ntcount','country_id','city_id')->where('gender', $lookingfor)->whereHas('role', function ($user) {
                $user->where('title', '=', 'subscriber');
            })->limit(6)->get();
        }
        else{
            return 'false';
        }

    }
    public function filtered_mem(Request $request){
        $fetch_arr=json_decode($request['arr'],true);
       $name=$fetch_arr[0]['name'];
       $country=$fetch_arr[0]['country'];
       $state=$fetch_arr[0]['state'];
       $city=$fetch_arr[0]['city'];
       $age=$fetch_arr[0]['age'];
       $gender=$fetch_arr[0]['gender'];
       $query = DB::table('users');
       if($name){
           $query->where('users.name', $name);
       }
       if($gender){
           $query->where('users.gender', $gender);
       }
        if($country){
            $query->where('users.country_id', $country);
        }
        if($state){
            $query->where('users.state_id', $state);
        }
        if($city){
            $query->where('users.city_id', $city);
        }
        if($age){
            $age1='';
            $age2='';

            if($age=='18-29'){
                $age1=18;
                $age2=29;
            }
            elseif($age=='30-39'){
                $age1=30;
                $age2=39;
            }
            elseif($age=='40-50'){
                $age1=40;
                $age2=50;
            }
            elseif($age=='51'){
                $age1=51;
                $age2='';
            }

            if($age1!==''){

                $query->where('users.ntcount','>=',$age1);
            }
            if($age2!==''){
                $query->where('users.ntcount','<=',$age2);
            }



        }
        $query->join('countries', 'users.country_id', '=', 'countries.id');
        $query->join('cities', 'users.city_id', '=', 'cities.id');
        $query->select('users.id', 'users.name', 'users.pictures','users.ntcount','users.country_id','users.city_id','countries.name as countryname','cities.name as cityname');


//        if($gender){
//            $query->where('gender', $gender);
//        }
      return  $results = $query->get();


    }
    public function send_message(Request $request)
 {

     $message = $request['message'];
     $datetime = $request['datetime'];
     $user_id = $request['user_id'];
     $mem_id = $request['mem_id'];
     $msg_id = $request['msg_id'];

//'lookingfor' => $lookingfor,

     $message1 = Message::create([
         'datetime' => $datetime,
         'message' => $message,
         'mem_id' => $mem_id,
         'msg_id' => $msg_id,
     ]);

     Messageconection::create([
         'msg_id' => $message1->id,
         'sender_id' => $user_id,
         'receiver_id' => $mem_id,
         'notifystatus' => 0,
         'notifycancelstatus' => 0,
         'paymentstatus' => 0,
         'readstatus' => 0,

     ]);
 }
    public function personality_match(Request $request){
                $user_id=$request['id'];

                $return_arr=array();
                $matches_arr=array();
                $user_data=User::where('id',$user_id)->select('lookingfor','id','block_arr')->first();
               $ques_ans=Personalityanswer::select('userid','questionid','optionid')

                 ->where('userid',$user_id)
                ->get();

                    $database_match = DB::table('users')
                    ->where('users.gender',$user_data['lookingfor'])
                    ->join('personalityanswers', 'users.id', '=', 'personalityanswers.userid')
                     ->whereNotIn('users.id',json_decode($user_data['block_arr'],true))
                    ->select('users.id', 'users.name', 'personalityanswers.questionid','personalityanswers.optionid')
                    ->get();
                    if(count($database_match)>0){
                        foreach($ques_ans as $user_ans){
                            $user_questionid=$user_ans['questionid'];
                            $user_optionid=$user_ans['optionid'];
                                foreach (json_decode($database_match,true) as $mem_ans){
                                    $id=$mem_ans['id'];
                                    $mem_questionid=$mem_ans['questionid'];
                                    $mem_optionid=$mem_ans['optionid'];
                                    if($user_questionid===$mem_questionid && $user_optionid===$mem_optionid){
                                        $matches_arr[]=$id;
                                    }
                                }
                         }


                        $matches_arr=array_count_values($matches_arr);
                        if(count($matches_arr)>0){
                            foreach ($matches_arr as $matched_key=>$matched_value){
                                $matched_user_id=$matched_key;
                                $matched_ans=$matched_value;
                                $ques_length=count($ques_ans);
                                 $percentage = round(($matched_ans * 100) / $ques_length);
                                $mac_data=User::with(['country','city'])->select('id', 'name', 'pictures','ntcount','country_id','city_id')
                                    ->where('id',$matched_user_id)
                                  ->first();
                                 $return_arr[]=array(
                                        'data'=>$mac_data,
                                        'match_ratio'=>$percentage
                                 );
                               $user_notification_db=Usernotification::
                                  where('catgories','personality')
                                  ->where('userid',$user_id)
                                  ->where('memberid',$matched_user_id)
                                  ->get();
                               if(count($user_notification_db)>0){
                                   foreach ($user_notification_db as $db_data){
                                       $db_percentage=$db_data['requestid'];
                                       if($db_percentage!==$percentage){
                                           $db_data['requestid']=$percentage;
                                           $db_data['notifystatus']=0;
                                           $db_data->save();
                                       }
                                   }
                               }
                               else{
                                   $post=new Usernotification();
                                   $post->catgories = 'personality';
                                   $post->userid = $user_id;
                                   $post->memberid = $matched_user_id;
                                   $post->notifystatus = 0;
                                   $post->datetime = date("Y-m-d");
                                   $post->requestid = $percentage;
                                   $post->save();
                               }
                            }

                        }



                    }
                    return $return_arr;



    }
    public function compatibility_match(Request $request){
                $user_id=$request['id'];
                $return_arr=array();
        $compatibility_questions=Question::all();
                $matches_arr=array();
                $user_data=User::where('id',$user_id)->select('lookingfor','id','block_arr')->first();
                $ques_ans=Answer::select('userid','questionid','optionid')
                ->where('userid',$user_id)
                ->get();

                $database_match = DB::table('users')
            ->where('users.gender',$user_data['lookingfor'])
            ->join('answers', 'users.id', '=', 'answers.userid')
            ->whereNotIn('users.id',json_decode($user_data['block_arr'],true))
            ->select('users.id', 'users.name', 'answers.questionid','answers.optionid')
           ->where('answers.deleted_at',NULL)
            ->get();
        if(count($database_match)>0) {
            foreach ($ques_ans as $user_ans) {
                $user_questionid = $user_ans['questionid'];
                $user_optionid = $user_ans['optionid'];
                foreach (json_decode($database_match, true) as $mem_ans) {
                    $id = $mem_ans['id'];
                    $mem_questionid = $mem_ans['questionid'];
                    $mem_optionid = $mem_ans['optionid'];
                    if ($user_questionid === $mem_questionid && $user_optionid === $mem_optionid) {
                        $matches_arr[] = $id;
                    }
                }
            }
             $matches_arr=array_count_values($matches_arr);
            if(count($matches_arr)>0){
                foreach ($matches_arr as $matched_key=>$matched_value){
                    $matched_user_id=$matched_key;
                    $matched_ans=$matched_value;
                    $ques_length=count($compatibility_questions);
                   $percentage = round(($matched_ans * 100) / $ques_length);
                    $mac_data=User::with(['country','city'])->select('id', 'name', 'pictures','ntcount','country_id','city_id')
                        ->where('id',$matched_user_id)
                        ->first();
                    $return_arr[]=array(
                        'data'=>$mac_data,
                        'match_ratio'=>$percentage
                    );
                    $user_notification_db=Usernotification::
                    where('catgories','compatibility')
                        ->where('userid',$user_id)
                        ->where('memberid',$matched_user_id)
                        ->get();
                    if(count($user_notification_db)>0){
                        foreach ($user_notification_db as $db_data){
                            $db_percentage=$db_data['requestid'];
                            if($db_percentage!==$percentage){
                                $db_data['requestid']=$percentage;
                                $db_data['notifystatus']=0;
                                $db_data->save();
                            }
                        }
                    }
                    else{
                        $post=new Usernotification();
                        $post->catgories = 'compatibility';
                        $post->userid = $user_id;
                        $post->memberid = $matched_user_id;
                        $post->notifystatus = 0;
                        $post->datetime = date("Y-m-d");
                        $post->requestid = $percentage;
                        $post->save();
                    }
                }
            }



        }
        return $return_arr;



    }
    public function match_request(Request $request){
        $main_id=$request['primary'];
        $secondary_id=$request['secondary'];
        $compatibility_questions=Question::all();

        $personality_match=0;
        $compatibility_match=0;
        $matches_arr1=array();
        $matches_arr2=array();
        $main_personality=Personalityanswer::select('userid','questionid','optionid')
            ->where('userid',$main_id)
            ->get();
        $secondary_personality=Personalityanswer::select('userid','questionid','optionid')
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




         $main_compatibility=Answer::select('userid','questionid','optionid')
            ->where('userid',$main_id)

            ->get();
        $secondary_compatibility=Answer::select('userid','questionid','optionid')
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
             Whoviewme::where('userid',$main_id)->where('memberid',$secondary_id)->first());


        return $return_arr;



    }
    public function update_viewed_status(Request $request){
        $userid=$request['userid'];
        $memberid=$request['memberid'];
        $member_data=User::select('name','email')->where('id',$memberid)->first();
        $user_data=User::with(['country','city'])->select('id', 'name', 'pictures','ntcount','country_id','city_id')
            ->where('id',$userid)
            ->first();
        $pic='';
        if(json_decode($user_data['pictures'],true)['profile']!=''){
            $pic=url('/').json_decode($user_data['pictures'],true)['profile'];
        }

        $notifystatus=$request['notifystatus'];
        $notifycancelstatus=$request['notifycancelstatus'];
        $winkstatus=$request['winkstatus'];
        $time=date("Y-m-d", strtotime("+5 hours +30 Minutes "));
        $db_data=Whoviewme::where('userid',$userid)->where('memberid',$memberid)->first();
        if($db_data){

            Whoviewme::where('userid',$userid)->where('memberid',$memberid)
                ->update([
                    'notifystatus' => $notifystatus,
                    'notifycancelstatus' => $notifycancelstatus,
                    'winkstatus' =>$winkstatus,
                    'datetime' => $time
                ]);
        }
        else{
           $post=new Whoviewme();
           $post->userid=$userid;
           $post->memberid=$memberid;
           $post->notifystatus=$notifystatus;
           $post->notifycancelstatus=$notifycancelstatus;
           $post->winkstatus=$winkstatus;
           $post->datetime=$time;
           $post->save();

        }
        $cat='';
        $mail=0;

        if($winkstatus==1){
            $cat='winked';
            $content=$user_data['name'].' Winked you';
            $mail=1;
        }
        if($notifystatus==1 ){
            $cat='yes';
            $content=$user_data['name'].' said Yes to you';
            $mail=1;
        }
        if( $notifycancelstatus==1){
            $cat='yes';
            $mail=0;

        }



        $user_notification_db=Usernotification::
        where('userid',$userid)
            ->where('memberid',$memberid)
            ->first();
        if($user_notification_db){


            if($notifystatus==1 || $winkstatus==1){
                Usernotification::
                    where('userid',$userid)
                    ->where('memberid',$memberid)
                    ->update([
                        'notifystatus' => 0,
                        'catgories'=>$cat
                      ]);
            }
            if($notifycancelstatus==1 ){
                DB::table('usernotifications')
                    ->where('userid',$userid)
                    ->where('memberid',$memberid)->delete();
            }





        }
        else{
            $post=new Usernotification();
            $post->catgories = $cat;
            $post->userid = $userid;
            $post->memberid = $memberid;
            $post->notifystatus = 0;
            $post->datetime =$time;
            $post->requestid = '';
            $post->save();
        }


        if($mail==1){
            $data=array('email'=>$member_data['email'],'name'=>$member_data['name']);
            $subject =$content;
            Mail::send('detail_mail',
                ['username' => $member_data['name'],
                    'content'=> $content,
                    'profile_pic'=>$pic,
                    'matched_name'=>$user_data['name'],
                    'age'=>$user_data['ntcount'],
                    'city'=>$user_data['city']['name'],
                    'country'=>$user_data['country']['name'],
                    'id'=>$user_data['id']  ],

                function ($message) use ($data,$subject)
                {
                    $message->to($data['email'], $data['name']);
                    $message->subject($subject);


                });

        }

        return Whoviewme::where('userid',$userid)->where('memberid',$memberid)->first();


    }
    public function fetch_noti(Request $request){
        $user_id=$request['user_id'];
        $staus=$request['status'];
        $category=$request['category'];
        if($user_id!=''){
            $user_data=User::select('block_arr')->where('id',$user_id)->first()['block_arr'];
        }
        if($staus==='1'){
            Usernotification::where('memberid',$user_id)
                ->update([
                    'notifystatus' => 1,
                ]);
        }

        if($staus==='2'){
            $query = DB::table('usernotifications');
            $query->join('users', 'usernotifications.memberid', '=', 'users.id');
            $query->whereNotIn('users.id',json_decode($user_data,true));
            $query->join('countries', 'users.country_id', '=', 'countries.id');
            $query->join('states', 'users.state_id', '=', 'states.id');
            $query->where('usernotifications.userid',$user_id);
            $query->Where('usernotifications.catgories',$category);

            $query->select(
                'usernotifications.catgories as noti_category',
                'usernotifications.userid as noti_userid',
                'usernotifications.memberid as noti_memberid',
                'usernotifications.notifystatus as noti_notifystatus',
                'users.name as user_name',
                'users.id as user_id',
                'users.ntcount as user_ntcount',
                'users.pictures as pictures',
                'countries.name as countries_name',
                'states.name as states_name'

            );
            $results =$query->paginate(5);
            foreach ( $results as $index=>$lead){

                $results[$index]->online=\Illuminate\Support\Facades\Cache::has('user-is-online-' . $lead->user_id);
// dump($lead->id);
            }
            return $results;

        }
        if($staus==='3'){

            $query = DB::table('usernotifications');
            $query->join('users', 'usernotifications.userid', '=', 'users.id');
            $query->whereNotIn('users.id',json_decode($user_data,true));

            $query->join('countries', 'users.country_id', '=', 'countries.id');
            $query->join('states', 'users.state_id', '=', 'states.id');
            $query->Where('usernotifications.memberid',$user_id);
            $query->Where('usernotifications.catgories',$category);


            $query->select(
                'usernotifications.catgories as noti_category',
                'usernotifications.userid as noti_userid',
                'usernotifications.memberid as noti_memberid',
                'usernotifications.notifystatus as noti_notifystatus',
                'users.name as user_name',
                'users.id as user_id',
                'users.ntcount as user_ntcount',
                'users.pictures as pictures',
                'countries.name as countries_name',
                'states.name as states_name'

            );
            $results =$query->paginate(5);
            foreach ( $results as $index=>$lead){

                $results[$index]->online=\Illuminate\Support\Facades\Cache::has('user-is-online-' . $lead->user_id);
// dump($lead->id);
            }
            return $results;

        }


        $query = DB::table('usernotifications');
        $query->join('users', 'usernotifications.userid', '=', 'users.id');
        $query->where('usernotifications.memberid',$user_id);
        $query->orderBy('usernotifications.id', 'DESC');
        return $results = $query->get();

//        return
    }
    public function fetch_msg(Request $request){
        $user_id=$request['user_id'];
        $staus=$request['status'];

        if($staus==='1'){
            Messageconection::where('receiver_id',$user_id)
                ->update([
                    'notifystatus' => 1,
                ]);
        }

        $query = DB::table('messageconections');
        $query->join('users', 'messageconections.sender_id', '=', 'users.id');
        $query->where('messageconections.receiver_id',$user_id);
        return $results = $query->get();

    }
    public function messageconections(Request $request){

        $data= User::where('id',$request['user_id'])
            ->select('block')
            ->get();
        $block='';
        foreach ( $data as $m ){
            $block=$m->block;
        }
        if(isset($block)){
            $b=json_decode($block,true);
        }
        else{
            $b=[];
        }

        $master=   Messageconection::with(['message','user','usermyside'])
            ->where('receiver_id',$request['user_id'])
            ->orwhere('sender_id',$request['user_id'])
            ->get();
        $users=[];
        foreach ( $master as $m ){

            if( !in_array($m->user ,$users) && !in_array($m->user->id ,$b) && $request['user_id']!=$m->user->id){
                $users[]=$m->user ;
            }
            if(  !in_array($m->usermyside ,$users) && !in_array($m->usermyside->id ,$b) && $request['user_id']!=$m->usermyside->id ){
                $users[]=$m->usermyside ;
            }

        }
        $new['user']=$users;
        return  $new;
    }
    public function messagechat(Request $request){

//           Messageconection::with(['message','user'])
//            ->where(['receiver_id'=> $request['user_id'],'sender_id'=> $request['other_id']])
//            ->orwhere(['receiver_id'=> $request['other_id'],'sender_id'=> $request['user_id']])
//            ->orderBy('created_at','DESC')->get();
        $user_id=$request['user_id'];
        $other_id=$request['other_id'];
//            $q = DB::table('messageconections')
             $q =    Messageconection::with(['message','user'])
                ->where(function ($query)use ($other_id,$user_id) {

            $query->where('receiver_id','=', $user_id)
                ->where('sender_id','=',$other_id);

        })

            ->orWhere(function($query) use ($other_id,$user_id) {

            $query->where('receiver_id','=',$other_id)
                ->where('sender_id','=', $user_id);

        })
            ->orderBy('created_at','DESC')->get();



        return    $q;
    }
    public function block_unblock_user(Request $request){
        $user_id=$request['user_id'];
        $block_user_id=$request['block_user_id'];
        $source=$request['source'];
        $return_arr=array();
         $user_data=User::select('block_arr')->where('id',$block_user_id)->first()['block_arr'];


        if($source==1){
            array_push($return_arr,$user_id);
            $data=Blockuser::where('user_id',$user_id)->where('block_user_id',$block_user_id)->first();
            if($data){
                Blockuser::where('user_id',$user_id)->where('block_user_id',$block_user_id)
                    ->update(['status' => 1]);
            }
            else{
                $new_post=new Blockuser();
                $new_post->user_id=$user_id;
                $new_post->block_user_id=$block_user_id;
                $new_post->status=1;
                $new_post->save();
            }

            if($user_data!=null){
                $old_arr=json_decode($user_data,true);
                $old_arr=array_merge($old_arr,$return_arr);

                User::select('block_arr')->where('id',$block_user_id)
                    ->update(['block_arr' => json_encode($old_arr)]);
            }
            else{

                User::select('block_arr')->where('id',$block_user_id)
                    ->update(['block_arr' => json_encode($return_arr)]);
            }

            return 'success';
        }
        elseif($source==2){

             $data=Blockuser::where('user_id',$user_id)->where('block_user_id',$block_user_id)->first();


             if($data){
             return $data->status;
             }
             else{
                 return 0;
             }

        }
        elseif($source==3){

            $data=Blockuser::where('user_id',$user_id)->where('block_user_id',$block_user_id)->first();
            if($data){
                Blockuser::where('user_id',$user_id)->where('block_user_id',$block_user_id)
                    ->update(['status' => 0]);
            }
            else{
                $new_post=new Blockuser();
                $new_post->user_id=$user_id;
                $new_post->block_user_id=$block_user_id;
                $new_post->status=0;
                $new_post->save();
            }
            foreach(json_decode($user_data,true) as $block){
                if($block!=$user_id){
                    array_push($return_arr,$block);
                }
            }
            User::select('block_arr')->where('id',$block_user_id)
                ->update(['block_arr' => json_encode($return_arr)]);
            return 'success';
        }
        elseif($source==4){
           return $data=Blockuser::select('user_id','status')->where('block_user_id',$block_user_id)->get();
        }


    }
    public function blockuser(Request $request){

        $data= User::where('id',$request['user_id'])
            ->select('block')
            ->get();
        $block='';
        foreach ( $data as $m ){
            $block=$m->block;
        }
        if(isset($block)){
            $b=json_decode($block,true);
        }
        else{
            $b=[];
        }
        $b[]=$request['block_id'];

        $user = User::findOrFail($request['user_id']);
        $user->update(['block'=>json_encode($b)]);
        return 'success';
    }
    public function unblockuser(Request $request){

        $data= User::where('id',$request['user_id'])
            ->select('block')
            ->get();
        $block='';
        foreach ( $data as $m ){
            $block=$m->block;
        }
        if(isset($block)){
            $b=json_decode($block,true);
        }
        else{
            $b=[];
        }

        $pos = array_search($request['unblock_id'], $b);



// Remove from array
        unset($b[$pos]);


        $user = User::findOrFail($request['user_id']);
        $user->update(['block'=>json_encode($b)]);
        return 'success';
    }
    public function blockuserlist(Request $request){

        $data= User::where('id',$request['user_id'])
            ->select('block')
            ->get();
        foreach ( $data as $m ){
            $block=$m->block;
        }
        if(isset($block)){
            $b=json_decode($block,true);
        }
        else{
            $b=[];
        }

//print_r($blocked);

        return   User::whereIn('id',$b)->get();

    }
    public function delete_chat(Request $request){


        $user_id=$request['user_id'];
        $other_id=$request['other_id'];
//            $q = DB::table('messageconections')
        $q =    Messageconection::with(['message','user'])
            ->where(function ($query)use ($other_id,$user_id) {

                $query->where('receiver_id','=', $user_id)
                    ->where('sender_id','=',$other_id);

            })

            ->orWhere(function($query) use ($other_id,$user_id) {

                $query->where('receiver_id','=',$other_id)
                    ->where('sender_id','=', $user_id);

            })
            ->delete();



    }
    public function viewed_profile(Request $request){
        $user_id=$request['sender'];
        $memberid=$request['receiver'];
        $counter=0;
        $member_data=User::select('name','email')->where('id',$memberid)->first();
        $user_data=User::with(['country','city'])->select('id', 'name', 'pictures','ntcount','country_id','city_id')
          ->where('id',$user_id)
          ->first();
        $pic='';
        if(json_decode($user_data['pictures'],true)['profile']!=''){
            $pic=url('/').json_decode($user_data['pictures'],true)['profile'];
        }

        $viewme_data=Whoviewme::where('userid',$user_id)->where('memberid',$memberid)->first();
        if($viewme_data){
            if($viewme_data['viewedstatus']==NULL || $viewme_data['viewedstatus']==''){
                Whoviewme::
                where('userid',$user_id)
                    ->where('memberid',$memberid)
                    ->update([
                        'viewedstatus' => 1,

                    ]);
            }
            else{
                $counter=1;
            }

        }
        else{
            {
                $post=new Whoviewme();
                $post->userid=$user_id;
                $post->memberid=$memberid;
                $post->notifystatus=0;
                $post->notifycancelstatus=0;
                $post->winkstatus=0;
                $post->viewedstatus=1;
                $post->datetime=date("Y-m-d", strtotime("+5 hours +30 Minutes "));
                $post->save();
            }
        }


        if($counter==0){

            $user_notification_db=Usernotification::
            where('userid',$user_id)->where('memberid',$memberid)->first();
            if($user_notification_db){


                Usernotification::
                where('userid',$user_id)
                    ->where('memberid',$memberid)
                    ->update([
                        'notifystatus' => 0,
                        'catgories'=>'viewed'
                    ]);







            }
            else{
                $post=new Usernotification();
                $post->catgories = 'viewed';
                $post->userid = $user_id;
                $post->memberid = $memberid;
                $post->notifystatus = 0;
                $post->datetime =date("Y-m-d", strtotime("+5 hours +30 Minutes "));
                $post->requestid = '';
                $post->save();
            }


            $content=$user_data['name'].' viewed your profile';

            $data=array('email'=>$member_data['email'],'name'=>$member_data['name']);
            $subject =$content;
            Mail::send('detail_mail',
                ['username' => $member_data['name'],
                    'content'=> $content,
                    'profile_pic'=>$pic,
                    'matched_name'=>$user_data['name'],
                    'age'=>$user_data['ntcount'],
                    'city'=>$user_data['city']['name'],
                    'country'=>$user_data['country']['name'],
                    'id'=>$user_data['id']  ],

                function ($message) use ($data,$subject)
                {
                    $message->to($data['email'], $data['name']);
                    $message->subject($subject);


                });


        }

        return 'success';






    }
    public function licence_check(Request $request){
        $data_arr=array('Personality'=>false,'Compatibility'=>false,'Full'=>false);
        echo json_encode($data_arr);


    }
    public function fetch_zodiac_sign_name(Request $request){
        $id=$request['id'];
        $name=Astrologycalc::where('id',$id)->select('zodiac')->first();
        if($name){
           return $name['zodiac'];
        }
        else{
            return '';
        }
    }
    public function fetch_personality_options(Request $request){
        $id=$request['id'];
        $options=Personalityoption::where('questionid',$id)->get();
        if(count($options)>0){
            return $options;
        }
        else{
            return array();
        }
    }
    public function fetch_compatibility_options(Request $request){
        $id=$request['id'];
        $options=Questionoption::where('questionid',$id)->get();
        if(count($options)>0){
            return $options;
        }
        else{
            return array();
        }
    }
    public function save_personality_options(Request $request){
        $question_id=$request['question_id'];
        $flag=$request['flag'];
        $data=json_decode($request['data'],true);
        if(count($data)>0 && $flag==1){
        foreach ($data as $options){

            Personalityoption::where('id',$options['id'])
                ->where('questionid',$question_id)
                ->update(['options' =>$options['options']]);

        }
        return 'success';
        }
        elseif(count($data)>0 && $flag==2 && $question_id!='undefined'){
            foreach ($data as $options){

                if ($options['options']!=""){
                    $post = new Personalityoption();
                    $post->options = $options['options'];
                    $post->questionid = $question_id;
                    $post->save();
                }




            }
            return 'success';
        }
        else{
            return 'fail';
        }

    }
    public function save_compatibility_options(Request $request){
        $question_id=$request['question_id'];
        $flag=$request['flag'];
        $data=json_decode($request['data'],true);
        if(count($data)>0 && $flag==1){
        foreach ($data as $options){

            Questionoption::where('id',$options['id'])
                ->where('questionid',$question_id)
                ->update(['options' =>$options['options']]);

        }
        return 'success';
        }
        elseif(count($data)>0 && $flag==2 && $question_id!='undefined'){
            foreach ($data as $options){

                if ($options['options']!=""){
                    $post = new Questionoption();
                    $post->options = $options['options'];
                    $post->questionid = $question_id;
                    $post->save();
                }




            }
            return 'success';
        }
        else{
            return 'fail';
        }

    }
    public function  reportproblem_fetch_data(Request $request){
        return reportaproblem::all();

    }
    public function  reportimage_fetch_data(Request $request){
        return reportimage::all();

    }
    public function fetch_user_name(Request $request){
        return User::select('name')->where('id',$request['id'])->first()['name'];
    }


}
