<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanctumController extends Controller
{
    public function list(){
        return Employee::all();
        //return DB::connection('mysql2')->table('employees')->get();
    }
}
