<?php
use app\Event\generate;
use App\Events\TaskEvent as EventsGenerate;
use App\listener\TaskEventListener;
use App\Models\Device;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Usercheck;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SanctumController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::post('/register',[HomeController::class,'create'])->name('register')->middleware('guest');
Route::get('/register', [HomeController::class,'view']);
Route::get('/login',[HomeController::class, 'login']);
Route::post('/login',[HomeController::class,'check'])->name('check');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', UsersController::class);
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/profile',[HomeController::class,'profile']);
    Route::get('/logout',[HomeController::class, 'logout'])->name('logout');
    //Route::get('/edit',[CrudController::class,'edit']);
    //Route::post('/edit',[CrudController::class, 'update'])->name('update');
   // Route::post('/register',[HomeController::class,'create'])->name('register');

});
Route::get('event',[CrudController::class,'index']);

Route::get('/email',function(){
    Mail::to("email@email.com")->send(new WelcomeMail());
    return new WelcomeMail();
});
Route::get('sendemail',[SendEmailController::class,'send']); 
Route::get('list',[DeviceController::class,'getdata']);
Route::get('data',[SanctumController::class,'list']);
Route::get('/event',function(){
    event(new EventsGenerate('hello,world'));
});
Route::get('test', [MailController::class,'index']);
Route::get('record/devices/{devices}', function (Device $devices){
    return $devices->price;
});
Route::get('employee/employees/{employee}', function (Employee $employee){
    return $employee->age;
});
Route::get('device/{key:name}',[RouteController::class,'index']);