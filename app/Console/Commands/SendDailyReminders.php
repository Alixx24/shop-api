<?php

namespace App\Console\Commands;

use App\Mail\DailyReminderMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class SendDailyReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send-daily';


    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily reminder emails to users';


    /**
     * Execute the console command.
     */
 

public function handle()
{
    $users = User::with(['reminders' => function($query) {
       $query->where('is_done', false);
    }])->get();

    foreach($users as $user)
    {
        if ($user->reminders->isNotEmpty())
        {
            Mail::to($user->email)->send(new DailyReminderMail($user->reminders));
            $this->info("Reminder sent to {$user->email}");
        }
    }

    $this->info('All reminders sent successfully.');
    return 0;
}

}
