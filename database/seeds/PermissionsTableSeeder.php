<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = ['users', 'icons', 'tags', 'categories', 'types', 'safes',
                    'groups', 'fields', 'roles', 'permissions'];
        foreach ($resources as $resource) {
            Permission::create(['name' => "browse {$resource}"]);
            Permission::create(['name' => "create {$resource}"]);
            Permission::create(['name' => "view {$resource}"]);
            Permission::create(['name' => "update {$resource}"]);
            Permission::create(['name' => "delete {$resource}"]);
            Permission::create(['name' => "restore {$resource}"]);
            Permission::create(['name' => "force delete {$resource}"]);
        }
    }
}
