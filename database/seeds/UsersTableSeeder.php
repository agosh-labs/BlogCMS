<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lets create a user 
        //We can use Create as we have already fillable set up
        App\User::create([
            'name' => 'agosh',
            'email' => 'agageldidurdyyev@gmail.com',
            'password' => bcrypt('12345678')//Laravel uses bcrypt to make password secured 
        ]);
    }
}
