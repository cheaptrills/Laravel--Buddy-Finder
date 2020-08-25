<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new \App\User();
        $users->firstName = "Sophie";
        $users->lastName = "Peeters";
        $users->year = "eerste";
        $users->bio = "Lorem Ipsum";
        $users->save();    
    }
}
