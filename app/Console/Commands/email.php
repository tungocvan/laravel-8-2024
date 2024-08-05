<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
class email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

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
        $toEmail = 'tungocvan@gmail.com';
        $subject = 'Subject of the email';
        $message = 'This is a simple test email message.';

        Mail::raw($message, function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                    ->subject($subject);
        });
        $this->info('Email has been sent');
    }
}
