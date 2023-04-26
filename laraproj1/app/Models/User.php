<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; 
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword as AuthCanResetPassword;

class User extends Authenticatable implements MustVerifyEmail,AuthCanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatarfile',
        'personalintro',
        'last_edit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
  ];
  public function userprofile() {
    # code...
    return $this->hasOne('App\Models\UserProfile');
  }
 /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
  // public function hasVerifiedEmail(){
  //   if($this->email_verified_at==Null){
  //     return false;
  //   }else {
  //     return true;
  //   }
  // }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
  // public function markEmailAsVerified(){
  //    
  //   $this->email_verified_at= new DateTime('now');
  //   $this->save();
  // }

    /**
     * Send the email verification notification.
     *
     * @return void
     */

}
