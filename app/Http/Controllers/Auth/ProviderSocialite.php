<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderSocialite extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
    try{
           $googleUser= Socialite::driver('google')->user();
           $user=User::where('google-id',$googleUser->getId())->first();
           if(!$user){
              $nweUser= User::create([
                'first_name'=>$googleUser->getName(),
                'last_name'=>$googleUser->getName(),
                'email'=>$googleUser->getEmail(),
                'google-id'=>$googleUser->getId(),

              ]);
              Auth::login($nweUser);
              return redirect()->intended('home');
           }else
           Auth::login($user);
           return redirect()->intended('home');
    }catch(\Throwable $th){
        dd('Somthing went wrong'.$th->getMessage());
    }
    }

}
