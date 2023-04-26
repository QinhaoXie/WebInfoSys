<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use App\Models\User;

class EmailVerifyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
    //
    $user = User::find($request->route('id')); //takes user ID from verification link. Even if somebody would hijack the URL, signature will be fail the request
        if ($user->hasVerifiedEmail()) {
      // return redirect()->intended(config('/') . '?verified=1');
      return 'Your email has been verified. Please login from : <a href="https://infs3202-942629ae.uqcloud.net/vue/login">login</a>';
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        
        $message = __('Your email has been verified.');

        return redirect('login')->with('status', $message); //if user is already logged in it will redirect to the dashboard page
    }
}
