<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
      /**
     * Show the profile for a given user.
     */

    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function login(string $username,string $password): string
    {
      /**
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
       */

	$User = new User();
	$User=$User->first();
	$username = $User->name ;
	$password = $User->password;
	$email = $User->email;
	return $User->toJson();
	//return (string)$username. (string)$password. (string)$email;
	//dd($username,$password,$email);
	
    }

    public function register(string $username,string $password,string $email): string
    {
      /**
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
       */
	$User = new User();
	
	$User->name = $username;
	$User->password= $password;
	$User->email= $email;
	$User->save();
	//dd($username,$password,$email);
	return "register success";
    }
}
