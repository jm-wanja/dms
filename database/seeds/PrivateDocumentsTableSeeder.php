<?php

use Illuminate\Database\Seeder;

class PrivateDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database
        DB::table('private-documents')->delete();

        $limit = 2;

            $ids = [1, 2];
            $title = ['testdoc', 'testdoc2'];
            $content = ['I belong to superman', 'I belong to batman'];
            $user_id = [1, 2];

            for ($i = 0; $i < $limit; $i++) {
                DB::table('private-documents')->insert([
                    'id' => $ids[$i],
                    'title' => $title[$i],
                    'content' => $content[$i],
                    'user_id' => $user_id[$i],
                ]);
            }

        $this->command->info('private docs created!');
    }
}