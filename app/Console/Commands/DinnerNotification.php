<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Traits\NotificationTrait;
use Illuminate\Console\Command;

class DinnerNotification extends Command
{
    use NotificationTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:dinner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sending Notification for dinner reminding.';

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
        $users = User::get();
        foreach ($users as $user) {
            if (isset($user->device_token)) {
                $this->send_notification($user->device_token, 'Dinner time!',
                                        "The best time to eat dinner is between 6:00 PM and 8:00 PM.");
            }
        }
    }
}
