<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 2;
        
            $user_ids = [1, 2];
            $username = ["superman", "batman"];
            $emails = ["superman@gmail.com", "batman@gmail.com"];
            $passwords = ["password", "password"];
            $role_ids = [1, 2];

            for ($i = 0; $i < $limit; $i++) {
                DB::table('users')->insert([
                    'id' => $user_ids[$i],
                    'username' => $username[$i],
                    'email' => $emails[$i],
                    'password' => Hash::make($passwords[$i]),
                    'role_id' => $role_ids[$i],
                ]);
            }

            $this->command->info('users created!');

    }
}