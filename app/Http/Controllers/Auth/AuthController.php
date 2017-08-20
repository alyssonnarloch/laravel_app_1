<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
    	$user = Socialite::driver($provider)->user();
		$authUser = User::where('email', $user->email)->first();

		Auth::login($authUser, true);		
		//echo '<PRE>';print_r($authUser);die;


    	return redirect('product/index');
    }
}
