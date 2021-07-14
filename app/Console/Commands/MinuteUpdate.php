<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class MinuteUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $user = User::all();
       foreach($user as $all){
           Mail::raw("this is automatically generated minute update", function($message) use ($all){

              $message->from('saumiljoshi64@gmail.com');
              $message->to($all->email)->subject('minute update');
           });
       }
       $this->info('minute update has been send successfully');
    }
}
