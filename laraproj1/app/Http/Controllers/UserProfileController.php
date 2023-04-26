<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

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
    public function show(UserProfile $userProfile,string $username)
    {
    //
     return $userProfile->getprofilebyuser($username)->toJson();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile,string $username)
    {
    //
    return $userProfile->getprofilebyuser($username)->toJson();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
