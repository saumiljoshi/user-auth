<?php

namespace App\Http\Controllers;
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

    public function create(Request $request)
    {
         $request->validate([
         'name'=>'required|min:3',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:5|max:12',
         'mobile_no'=>'required|min:10', 
        ]);
          $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->mobile_no = $request->mobile_no;
          $user->save();
          
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

