<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Model::reguard();
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionADMINTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        //$this->call(ClasificadoresSeeder::class);
    }
}
