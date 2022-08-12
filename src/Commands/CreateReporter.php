<?php

namespace Upkareno\ErrorReporter\Commands;

use Illuminate\Console\Command;

class CreateReporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:reporter';

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
        // get input from user
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');

        // save a user to the database
        $user = new \Upkareno\ErrorReporter\Models\ReporterUser();
        $user->name = $name;
        $user->email = $email;
        $user->save();

        // show message
        $this->info('User saved successfully.');
        return 0;

    }

}
