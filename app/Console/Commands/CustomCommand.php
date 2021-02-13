<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CustomCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Custom Command Class';

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
        //
    }

    public function recursiveAsk($question)
    {
        $output = $this->ask($question);
        if (!$output) {
            $this->error("Field is required");
            return $this->recursiveAsk($question);
        }
        return $output;
    }
}
