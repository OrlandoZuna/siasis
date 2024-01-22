<?php

use App\PermissionRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            
            RolesTableSeeder::class,
          
            PermissionADMINTableSeeder::class,
            ConnectRelationshipsSeeder::class,
        ]);
    }
}
