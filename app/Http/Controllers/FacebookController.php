<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use App\User;
use Socialite;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/home');
        }

        if ($socialUser->getEmail() == null) {
            $user = User::create([
                'facebook_id' => $socialUser->getId(),
                'name' => $socialUser->getName(),
                ]);

            auth()->login($user);
            return redirect()->to('/home');
        } else {
            $user = User::where('facebook_id', $socialUser->getId())->first();

            if (!$user) {

          //Call alternative query to make merge
                $checkUser = User::where('email', $socialUser->getEmail())->first();

                if ($checkUser != null) {
                    if ($checkUser->email == $socialUser->getEmail()) {
                        User::where('email', $socialUser->getEmail())
                                ->update(['facebook_id' => $socialUser->getId()]);

                        auth()->login($checkUser);

                        return redirect()->to('/');
                    }
                } else {
                    $user = User::create([
                        'facebook_id' => $socialUser->getId(),
                        'name' => $socialUser->getName(),
                        'email' => $socialUser->getEmail(),
                        ]);

                    auth()->login($user);
                    return redirect()->to('/home'); //this is the url to register after login facebook for first time
                }
            } else {
                auth()->login($user);
                return redirect()->to('/home');
            }
        }
    }
}
