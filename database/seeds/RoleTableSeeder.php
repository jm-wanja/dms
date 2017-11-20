<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database
        DB::table('role')->delete();

        $limit = 2;

        $role_ids = [1, 2];
        $role = ["fellow", "facilitator"];

        for ($i = 0; $i < $limit; $i++) {
            DB::table('role')->insert([
                'id' => $role_ids[$i],
                'role' => $role[$i],
            ]);
        }

        $this->command->info('Roles created!');
    }
}