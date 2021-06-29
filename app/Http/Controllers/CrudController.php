<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    public function edit(User $user){
        return view('auth.edit')->with('user',$user);
}
    public function update(Request $request,User $user){

    }
}