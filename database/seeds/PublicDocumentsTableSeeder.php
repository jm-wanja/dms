<?php

use Illuminate\Database\Seeder;

class PublicDocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database
        DB::table('public-documents')->delete();

        $limit = 2;
        
                    $ids = [1, 2];
                    $title = ['publicdoc', 'publicdoc2'];
                    $content = ['I belong to anyone', 'I belong to everyone'];

                    for ($i = 0; $i < $limit; $i++) {
                        DB::table('public-documents')->insert([
                            'id' => $ids[$i],
                            'title' => $title[$i],
                            'content' => $content[$i],
                        ]);
                    }

        // link all users to all public docs for many to many
        // $publicdoc->user()->attach($superman->id);
        // $publicdoc->user()->attach($batman->id);

        // $publicdoc2->user()->attach($superman->id);
        // $publicdoc2->user()->attach($batman->id);

        $this->command->info('public docs created!');
    }
}