<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function getdata(){
      return Device::find(2);
    }
}
