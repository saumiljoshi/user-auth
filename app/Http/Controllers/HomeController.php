<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store as RequestsStore;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
         //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function view()
    {
        return view('auth.register');
    } 

    public function create(RequestsStore $request)
    {
        
        $data = $request->validated();
        

        //$data['password'] = bcrypt($request->password);
           
        $user=User::create($data); 
        Auth::login($user);
            return redirect()->route('dashboard');
         }
      
        public function login()
        {
            return view('auth.login');
        }
        public function check(Request $request){
              
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
                //return User::where(['email'=>$request->email])->first();
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        public function dashboard(){
            $user = Auth::user();
            return view('auth.dashboard', ['user' => $user]);
        }
        public function logout(Request $request){
            $auth = Auth::logout();
            if($auth){
                return "success";
            }
            return redirect()->route('register');
        }
        public function profile(){
            $user = User::all();
            return view('auth.profile',compact('user'));
        }
}

