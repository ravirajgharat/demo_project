<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            //dd($user->id);
            $finduser = User::where('google_id', $user->id)->first();
            //dd($user->id);
            if($finduser){
   
                Auth::login($finduser);
  
                return redirect('/home');
   
            }else{
                $nameArray = explode(' ',$user->name);
                $newUser = User::create([
                    'firstname' => $nameArray[0],
                    'lastname' => $nameArray[1],
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);

                $role = Role::where('name', 'customer')->first()->id;
                $newUser->assignRole($role);
                $newUser->save();

                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('google');
        }
    }

}
