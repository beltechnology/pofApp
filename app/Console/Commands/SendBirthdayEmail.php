<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendBirthdayEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users a birthday message and promo code';

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
     * @return mixed
     */
    public function handle()
    {
       Mail::queue('emails.birthday', ['user' => "ravi"], function ($mail) {
            $mail->to("ravi@bel-technology.com")
                ->from('ram@bel-technology.com', 'Company')
                ->subject('Happy Birthday!');
        });
    }
}
