<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function index(){
        return view('send_email');
    }
    function send(Request $request){

       
       return back()->with('success','thanks for contacting us!');
    }
}
