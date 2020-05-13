<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::whereName('developer')->first();
        $resources = ['fields', 'groups', 'safes'];
        foreach ($resources as $resource) {
            $developer->givePermissionTo("browse {$resource}");
            $developer->givePermissionTo("create {$resource}");
            $developer->givePermissionTo("view {$resource}");
            $developer->givePermissionTo("update {$resource}");
            $developer->givePermissionTo("delete {$resource}");
            $developer->givePermissionTo("restore {$resource}");
            $developer->givePermissionTo("force delete {$resource}");
        }

        $admin = Role::whereName('admin')->first();
        $admin->givePermissionTo(Permission::all());
    }
}
