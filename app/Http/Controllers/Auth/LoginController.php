<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        protected function redirectTo(){
            if( Auth()->admin()->role == 0){
                return route('admin.dashboard');
            }
            elseif( Auth()->user()->role == 1){
                return route('caleg.dashboard');
            }
            elseif( Auth()->user() == 2){
                return route('supervisor.dashboard');
            }
            elseif( Auth()->user() == 3){
                return route('relawan.dashboard');
            }
        }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:caleg')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        // dd($request->all());

        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){
            if( auth()->user()->role == 1 ){
                return redirect()->route('caleg.dashboard');
            }
            elseif( auth()->user()->role == 2 ){
                return redirect()->route('supervisor.dashboard');
            }
            elseif( auth()->user()->role == 3 ){
                return redirect()->route('relawan.dashboard');
            }
        }else{
            return redirect()->route('login')->with('error','Email and password are wrong');
        }
    }

    public function showAdminLoginForm()
    {
        return view('auth.adminlogin', ['url' => route('admin.login-view'), 'title'=>'Admin']);
    }

    public function adminLogin(Request $request)
    {
        // dd(Auth::guard('admin')->attempt((['email' => $request->email, 'password' => $request->password])));
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt((['email' => $request->email, 'password' => $request->password]))){
            return redirect()->route('admin.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    
    public function showCalegLoginForm()
    {
        return view('auth.caleglogin', ['url' => route('caleg.login-view'), 'title'=>'Caleg']);
    }

    public function calegLogin(Request $request)
    {
        // dd(Auth::guard('admin')->attempt((['email' => $request->email, 'password' => $request->password])));
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('caleg')->attempt((['email' => $request->email, 'password' => $request->password]))){
            return redirect()->route('caleg.dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}