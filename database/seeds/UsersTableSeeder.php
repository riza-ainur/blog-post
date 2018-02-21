<?php

use App\User;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $user = new User;
        $user->uuid = Uuid::generate();
        $user->name = 'owner';
        $user->email = 'owner@sociolla.com';
        $user->password = bcrypt('owner');
        $user->save();
    }
}
