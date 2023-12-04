<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
//        $SocialUser = Socialite::driver($provider)->user();
//
//        $user = User::updateOrCreate([
//            'provider_id' => $SocialUser->id,
//            'provider' => $provider
//        ], [
//            'first_name' => $SocialUser->name,
//            'username' => $SocialUser->nickname,
//            'email' => $SocialUser->email,
//            'provider_token' => $SocialUser->token,
//        ]);
//
//        Auth::login($user);
//
//        return redirect('/dashboard');


        $SocialUser = Socialite::driver($provider)->user();

        try {
            // Retrieve user information from the social provider
            $socialUser = Socialite::driver($provider)->user();

            // Check if the user's email already exists in the database
            if (User::where('email', $socialUser->getEmail())->exists()) {
                return redirect('/login')->withErrors(['email' => 'This email uses a different method to login.']);
            }

            // Find or create a user based on the provider and provider ID
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->getId()
            ])->first();


            if (!$user) {
                // Create a new user if one doesn't exist
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'username' => User::generateUserName($socialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
//                    'email_verified_at' => now(),
//                    'email_verified_at' => sendEmailVerificationNotification(),

                ]);
                // Send email verification notification
                $user->sendEmailVerificationNotification();

            }
            // Log in the user
            Auth::login($user);
            return redirect('/email-verify'); // Replace '/dashboard' with the desired redirect URL

        } catch (Exception $e) {
            // Handle any exceptions that may occur during the process
            return redirect('/login')->withErrors(['message' => 'An error occurred. Please try again.']);
        }


    }
}
