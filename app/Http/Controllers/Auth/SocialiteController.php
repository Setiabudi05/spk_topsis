<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $registeredUser = User::where('google_id', $socialUser->id)->first();
        $registeredEmail = User::where('email', $socialUser->email)->first();

        if (!$registeredUser) {
            if (!$registeredEmail) {
                $user = User::updateOrCreate([
                    'google_id' => $socialUser->id,
                ], [
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => Hash::make('123456'),
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                    'email_verified_at' => now(),
                ]);
                $user->assignRole('Umum');
                Auth::login($user);
                return redirect('/');
            } else {
                $user = User::updateOrCreate([
                    'email' => $socialUser->email,
                ], [
                    'google_id' => $socialUser->id,
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);

                if (!$user->hasAnyRole('Superadmin', 'Admin', 'Umum')) {
                    dd('end');
                }
                Auth::login($user);
                return redirect('/');
            }
            # code...
            // $userData = [
            //     'google_id' => $socialUser->id,
            //     'name' => $socialUser->name,
            //     'email' => $socialUser->email,
            //     'password' => Hash::make('123456'),
            //     'google_token' => $socialUser->token,
            //     'google_refresh_token' => $socialUser->refreshToken,
            //     'email_verified_at' => now(),
            // ];
            // $user = User::updateOrCreate(
            //     function ($query) use ($userData) {
            //         return $query->where('email', $userData['email'])
            //             ->orWhere('google_id', $userData['google_id']);
            //     },
            //     $userData
            // );
        }
        Auth::login($registeredUser);
        return redirect('/');
    }
}
