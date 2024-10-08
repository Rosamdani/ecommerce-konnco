<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $account = User::where('client_id', $user->id)->first();

            if ($account) {
                $account->update([
                    'client_id' => $user->id,
                ]);
                Auth::login($account);
                return redirect()->intended();
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'client_id' => $user->id,
                    'password' => bcrypt('password'),
                ]);
                Auth::login($newUser);
                return redirect()->intended();
            }
        } catch (\Exception $e) {
        }
    }
}
