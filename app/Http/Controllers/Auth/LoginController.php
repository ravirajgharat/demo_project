<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect to google api.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback from google api.
     *
     * @return callback URL from google
     */   
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            //Check if User Exist
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            } else {
                $nameArray = explode(' ',$user->name);
                //Create new User
                $newUser = User::create([
                    'firstname' => $nameArray[0],
                    'lastname' => $nameArray[1],
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);
                //Assign Customer Role To User
                $role = Role::where('name', 'customer')->first()->id;
                $newUser->assignRole($role);
                $newUser->save();
                //Login User
                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('google');
        }
    }

    /**
     * Redirect to facebook api.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();
            //Check if User Exist
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            } else {
                $nameArray = explode(' ',$user->name);
                $role = Role::where('name', 'customer')->first()->id;
                //Check if Email Exist
                if($user->email) {
                    $email = $user->email;
                } else {
                    $email = 'user' . $user->id . '@shop.com';
                }
                //Create new User
                $newUser = new User;
                $newUser->firstname = $nameArray[0];
                $newUser->lastname = $nameArray[1];
                $newUser->email = $email;
                $newUser->facebook_id = $user->id;
                $newUser->save();
                //Assign Customer Role To User
                $newUser->assignRole($role);
                $newUser->save();
                //Login User
                Auth::login($newUser);
   
                return redirect('/cust/shop');
            }
  
        } catch (Exception $e) {
            return redirect('facebook');
        }
    }

/**
     * Redirect to google api.
     *
     * @return void
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Return a callback from twitter api.
     *
     * @return callback URL from twitter
     */   
    public function handleTwitterCallback()
    {
        try {

            $user = Socialite::driver('twitter')->user();
            //Check if User Exist
            $finduser = User::where('twitter_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/home');
            } else {
                $nameArray = explode(' ',$user->name);
                $role = Role::where('name', 'customer')->first()->id;
                //Check if Email Exist
                if($user->email) {
                    $email = $user->email;
                } else {
                    $email = 'user' . $user->id . '@shop.com';
                }
                //Create new User
                $newUser = new User;
                $newUser->firstname = $nameArray[0];
                $newUser->lastname = $nameArray[1];
                $newUser->email = $email;
                $newUser->twitter_id = $user->id;
                $newUser->save();
                //Assign Customer Role To User
                $newUser->assignRole($role);
                $newUser->save();
                //Login User
                Auth::login($newUser);
   
                return redirect('/cust/shop');
            }
  
        } catch (Exception $e) {
            return redirect('twitter');
        }
    }

}
