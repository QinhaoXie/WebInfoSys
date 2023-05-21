<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Livewire\Request as LivewireRequest;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    //
      /**
     * Show the profile for a given user.
     */

    // public function show(string $id): View
    // {
    //     return view('user.profile', [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }

    public function login(Request $request): string
    {
    //   if($request->hasSession()){
    //       return redirect()->intended('/vue/');
    // }
    // return $request->input('username'); 
    $credentials = $request->all(['email', 'password'])
    ->validate([
                  'email' => ['required', 'email'],
                  'password' => ['required'],
              ]);
    
    //  $credentials =[ 'name'=>$request->username,
       // 'password'=>$request->password];
    $name=$request->email;
    $password=$request->password;
   //  $name='xqh123';
   // $password='xqh123'; 
        $user = new User();
        if ($token = auth()->attempt($credentials)) {
        // if (!$user->login($name,$password)->isEmpty()) {
      $request->session()->regenerate();
      // response()->cookies("session_id",$request->getSession()->getId(),11111111111111);
      // return $request->session_id;
       $cookie = $this->getCookie($token);
      
       return response()->json([
            'token' => $token,
            'user' => auth()->user(),
      ])->cookie("loginalready","true",1000);

      // session(['username' => $name]); 
      //       $n=$request->username;
      //       return redirect()->intended('/vue/');
      // return "login success";
      // $_COOKIE['session_id']=$request->getSession()->getId();
        //     
        }
        return "login failed:The provided credentials do not match our records.";
       
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

  }

  //  private function getCookie($token)
  //   {
  //       return cookie(
  //           env('AUTH_COOKIE_NAME'),
  //           $token,
  //           auth()->factory()->getTTL(),
  //           null,
  //           null,
  //           env('APP_DEBUG') ? false : true,
  //           true,
  //           false,
  //           'Strict'
  //       );
  // }

    public function logout(Request $request)
    {
        Auth::logout();
    //     $request->session()->invalidate();
    // 
    //     $request->session()->regenerateToken();
        $session_id=$request->session()->getId();
        $request->session()->getHandler()->destroy($session_id);
        return 'session destroyed';
        // return "sssss";

    }
    
    public function register(string $username,string $password,string $email,string $bestfriend,string $favoritetoy): string
    {
      /**
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
       */
    // return "register success";
    // if(!isEmpty(DB::table("users")
    //   ->where("email",'=',$email)
    //   ->get())){
    //   return "email exist"; 
    // };
    $User = new User();
    
    $User->name = $username;
    $User->password= $password;
    $User->email= $email;
    $User->bestfriend= $bestfriend;
    $User->favoritetoy= $favoritetoy;
    $User->save();
    // create userprofile for new user
    
    $tmpupc=new  UserProfileController();
    $tmpupc->create($User->id); 
    //dd($username,$password,$email);
    event(new Registered($User));

    $noti = new SendEmailVerificationNotification();
    $noti->handle(new Registered($User));
    return "register success";
  }
 public function update(Request $request, string $username,string $password,string $email,string $bestfriend,string $favoritetoy): string
    {
      /**
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
       */
    // return "register success";
    //

    $user_id=$users = DB::table('users')
                     ->select(DB::raw('id'))
    ->where('email', '=', $email)
    ->where('bestfriend','=',$bestfriend)
      ->where('favoritetoy','=',$favoritetoy)
    ->get();
     // [0]->id;
    if(!$user_id->isEmpty()){
    \App\Models\User::where('id', $user_id[0]->id)
               ->update(['password' => $password]);
      return "update success";
    }else{return 'update failed';}
    // return $email; 




    $User = new User();
    
    $User->name = $username;
    $User->password= $password;
    $User->email= $email;
    $User->bestfriend= $bestfriend;
    $User->favoritetoy= $favoritetoy;
    $User->save();
    // create userprofile for new user
    
    $tmpupc=new  UserProfileController();
    $tmpupc->create($User->id); 
    //dd($username,$password,$email);
    event(new Registered($User));
    return "register success";
    }

}
