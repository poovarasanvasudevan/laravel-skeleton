<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

/**
 * Class CreateUser
 * @package App\Console\Commands
 * @author Poovarasan Vasudevan
 */
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:createuser {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new User';


    var $user;

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info("Data Received : " . $this->argument("name") . " -- " . $this->argument("email"));

        $this->user->name = $this->argument("name");
        $this->user->email = $this->argument("email");
        $this->user->password = $this->argument("password");
        if ($this->user->save()) {
            $this->info("User Created Succesfully and their id  id " . $this->user->id);
        } else {
            $this->error("Failed to create user..");
        }
    }
}
