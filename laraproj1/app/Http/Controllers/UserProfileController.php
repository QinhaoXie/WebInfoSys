<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
    //
    $userprofile = new UserProfile();
    $userprofile->user_id = $id;
    $userprofile->avatarfile = "";
    $userprofile->personalintro = "";
    $userprofile->avatarfile = "";
    $userprofile->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile,string $email)
    {
    //
     return $userProfile->getprofilebyuser($email)->toJson();

    }

    /**
     * Show the form for  wediting the specified resource.
     */
    public function edit(UserProfile $userProfile,string $email)
    {
    //
    return $userProfile->getprofilebyuser($email)->toJson();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
    //
    $info = $request->personinfo;
    $email = $request->email;
    $user_id=$users = DB::table('users')
                     ->select(DB::raw('id'))
                     ->where('email', '=', $email)
                     ->get()[0]->id;
    // return $user_id;
    \App\Models\UserProfile::where('user_id', $user_id)
               ->update(['personalintro' => $info]);
    return redirect('/vue/userprofile');
    // return $email; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
