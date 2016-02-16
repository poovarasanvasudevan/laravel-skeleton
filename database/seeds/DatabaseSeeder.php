<?php

use App\Setting;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this > $this->call(UserTableSeeder::class);
        $this > $this->call(SettingsSeeder::class);
    }
}

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Implement run() method.


        DB::table("users")->delete();
        User::create(["name" => "Poovarasan", "email" => "poosan9@gmail.com", "password" => "password"]);
        User::create(["name" => "Ramasamy", "email" => "ramasamy@gmail.com", "password" => "password"]);
    }
}

class SettingsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Implement run() method.

        DB::table("settings")->delete();


        $menu = array();
        array_push($menu, array(["name" => "Account Settings", "icon" => "mdi-accounts", "action" => ""]));
        array_push($menu, array(["name" => "System Settings", "icon" => "mdi-settings", "action" => ""]));
        array_push($menu, array(["name" => "Logout", "icon" => "mdi-accounts", "action" => ""]));

        Setting::create([
            "name" => "headermenu",
            "data" => json_encode($menu[0])
        ]);

    }
}
