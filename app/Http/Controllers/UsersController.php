<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('auth.profile',compact('user'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return request()->validate([
            'name' => 'required|max:3',
            'email' => 'required|email|unique:users',
            'password' => 'required||min:5',
            'mobile_no' => 'required|max:10'
        ]);
        /*$user = new User();
        $user->name = $request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->mobile_no=$request->mobile_no;*/

       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       
        $data = $user;
         
        return view('auth.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request,User $user)
    {   
       
       
        $data = $request->validated();
        
        $data['password'] = bcrypt($request->password);
        
        $user = $user->update($data);

        if($user){
            return redirect()->route('users.index');
        }
    }
   
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        if($data){
            return back()->with('deleted successfully');
       }
    }
}
