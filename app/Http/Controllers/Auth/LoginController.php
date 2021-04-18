<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


   public function loginpage(Request $request){
	   
	  $username = $request->email; //the input field has name='username' in form
      $password = $request->password; //the input field has name='username' in form
if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
    //user sent their email 
    Auth::attempt(['email' => $username, 'password' => $password]);
} else {
    //they sent their username instead 
   Auth::attempt(['name' => $username, 'password' => $password]);
}

//was any of those correct ?
if ( Auth::check() ) {
	
	
    //send them where they are going 
    return redirect('/');
}else{
	echo '<script type="text/javascript">
   alert("Wrong credentials");
    </script>';
 //return redirect('/home');
}

	   
   }

}
