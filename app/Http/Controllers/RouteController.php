<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Event\UserCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class RouteController extends Controller
{
    
    public function index(Device $key){
       return $key;
    }
    
}