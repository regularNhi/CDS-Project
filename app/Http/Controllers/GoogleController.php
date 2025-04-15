<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {

        return Socialite::driver('google')->redirect();
    }


    public function googlecallback()
    {

        try {
      
            $user = Socialite::driver('google')->user();
            
            
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser)

            {
       
                Auth::login($finduser);
      
                return redirect()->intended('redirect');
       
            }

            else

            {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'password' => Hash::make('12345678')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('redirect');
            }
      
        } catch (Exception $e) {
            \Log::error('Google login error: ' . $e->getMessage());
        return redirect()->route('login')->withErrors(['error' => 'Failed to log in with Google.']);
        }

    }
}
