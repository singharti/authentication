<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NotifyUserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class NotifyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
       foreach ($user as $a)
       {
            Mail::raw("This is automatically generated Hourly Update", function($message) use ($a)
            {
                $message->from('saquib.gt@gmail.com');
                $message->to($a->email)->subject('Hourly Update');
            });
        }
    }
}
