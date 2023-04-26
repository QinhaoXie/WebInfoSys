<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  protected $primaryKey = 'profile_id';
  use HasFactory;    
  protected $fillable = [
        'avatarfile',
        'personalintro',
        'last_edit',
    ];
  public function user() {
      # code...
   return $this->belongsTo('App\Models\User');

  }
  public function getprofilebyuser(string $username = null) {
    # code...
    if ($username != null){
      return $this->join('users', 'user_profiles.user_id', '=', 'users.id')
        ->select('users.*', 'user_profiles.*')
        ->orderBy('name', 'desc') 
        ->where('name',$username)
    // ->take(1)
        ->get();
    }
  }
}
