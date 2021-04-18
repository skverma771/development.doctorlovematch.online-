<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Whoviewme;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class UsersController extends Controller
{
    public function index()
    {
        if (Gate::denies('user_access')) {
            return abort(401);
        }

        return new UserResource(User::with(['role', 'country', 'state', 'city'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('user_view')) {
            return abort(401);
        }

        $user = User::with(['role', 'country', 'state', 'city'])->findOrFail($id);

        return new UserResource($user);
    }
    public function indexlist()
    {

        $user =  User::with(['role', 'country', 'state', 'city'])->inRandomOrder()
            ->select('name','dob','pictures')
            ->limit(10)->get();



        return new UserResource($user);
    }

    public function store(StoreUsersRequest $request)
    {
        if (Gate::denies('user_create')) {
            return abort(401);
        }

        $user = User::create($request->all());
        $user->role()->sync($request->input('role', []));


        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        if (Gate::denies('user_edit')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->role()->sync($request->input('role', []));



        return (new UserResource($user))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('user_delete')) {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return response(null, 204);
    }
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
    public  function fetch_samecountry(Request $request){
        // return Auth::id();
        $user_data=User::select('block_arr')->where('id',Auth::id())->first()['block_arr'];
        $data=User::with([ 'country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })->where('id','!=',Auth::id())
            ->where('country_id',Auth::user()->country_id)->where('gender',Auth::user()->lookingfor)
            ->whereNotIn('id',json_decode($user_data,true))
            ->orderBy('id', 'DESC')->paginate(5);








        foreach ( $data as $index=>$lead){

            $data[$index]->online=\Illuminate\Support\Facades\Cache::has('user-is-online-' . $lead->id);
// dump($lead->id);
        }


        return $data;
    }

    public  function fetch_samecountry2(Request $request){

        $user_data=User::select('block_arr')->where('id',Auth::id())->first()['block_arr'];
        $data=    User::with([ 'country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })->where('id','!=',Auth::id())
            ->where('country_id',Auth::user()->country_id)->where('gender',Auth::user()->lookingfor)
            ->whereNotIn('id',json_decode($user_data,true))
            ->orderBy('id', 'DESC')->get();

         $viewed_data=Whoviewme::where('userid',Auth::id())->select('id','memberid')->get();

         $return_arr=array();
         if(count($viewed_data)>0){
             foreach($data as $mem){
                        $counter=0;
                         foreach($viewed_data as $viewed) {

                             if($mem['id']==$viewed['memberid']){
                                 $counter=1;
                                 }


                         }
                         if($counter!=1){
                             $mem['match_status']=fetch_match_request(Auth::id(),$mem['id']);
                             array_push($return_arr,$mem);
                         }


             }
                 return $return_arr;

         }
         else{
             if(count($data)>0) {
                 foreach ($data as $mem) {
                     $mem['match_status']=fetch_match_request(Auth::id(),$mem['id']);
                     array_push($return_arr,$mem);

                 }
                 return $return_arr;
             }
         }

        return $data;
    }

    public  function all_members(Request $request){
        $user_data=User::select('block_arr')->where('id',Auth::id())->first()['block_arr'];
        $data=  User::with(['country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })->where('id','!=',Auth::id())
            ->where('gender',Auth::user()->lookingfor)
            ->whereNotIn('id',json_decode($user_data,true))
            ->orderBy('id', 'DESC')->paginate(5);


        foreach ( $data as $index=>$lead){

            $data[$index]->online=\Illuminate\Support\Facades\Cache::has('user-is-online-' . $lead->id);
            //dump($lead->id);
        }
        return $data;
    }

    public  function online_members(Request $request){

        $result=[];
        $user_data=User::select('block_arr')->where('id',Auth::id())->first()['block_arr'];
        $data=  User::with(['country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })->where('id','!=',Auth::id())
            ->where('gender',Auth::user()->lookingfor)
            ->whereNotIn('id',json_decode($user_data,true))
            ->orderBy('id', 'DESC')->get();
        //   dump($data);
        foreach ( $data as $index=>$lead){
            //dump($lead->id);
            if(\Illuminate\Support\Facades\Cache::has('user-is-online-' . $lead->id)){
                $result[]=$lead->id;
            }

        }
//dump($result);

        return   User::with([ 'country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })
            ->where('gender',Auth::user()->lookingfor)
            ->whereIn('id', $result)
            ->orderBy('id', 'DESC')->paginate(5);

    }

    public  function viewed_members(Request $request){
        //  return Auth::id();
        $user = new User;
//         $us=   $user->allOnline();
        $us=[];
        $fine=[];
        //  print_r($us);
        foreach ($us as $u){
//dd($u);
            $fine[]=$u->id;
        }
//        return   $fine;
//        return   ( \Illuminate\Support\Facades\Cache::has('user-is-online-' . Auth::id()))?'hi':'hello';
//dd(\Illuminate\Support\Facades\Cache::has('user-is-online-' . Auth::id()));
        $my_array = $fine;
        $to_remove = array(Auth::id());
        $result = array_diff($my_array, $to_remove);

        return   User::with([ 'country', 'state', 'city'])
            ->whereHas('role', function ($users) {
                $users->where('title', '=','Subscriber');
            })
            ->where('gender',Auth::user()->lookingfor)
            ->whereIn('id', $result)
            ->orderBy('id', 'DESC')->paginate(5);

    }

    public function fetch_license(){

        return $lic= User::where('id',Auth::id())->select('license')->first();

    }
}
