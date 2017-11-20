<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\PrivateDocument;
use App\Models\PublicDocument;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('PrivateDocumentsTableSeeder');
        $this->call('PublicDocumentTableSeeder');
        $this->command->info('DMS app seeds finished.');

    }
}
