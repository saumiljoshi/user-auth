<?php

namespace App\Http\Controllers;
use App\Event\UserCreated;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
             event( new UserCreated("event code from controller"));  
    }
}
