<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\User;
use App\Permissions;
class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = Permissions::all();
        $per_id = Permissions::pluck("id");

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = Roles::first();
        foreach ($permissions as $permission) {
            $roleAdmin->permisos()->attach($permission);
        }
        $user=User::find(1);
        $user->permisos()->attach($per_id);
    }
}
