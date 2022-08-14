<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [ 'name' => 'view_users' ],
            [ 'name' => 'edit_users' ],
            [ 'name' => 'view_roles' ],
            [ 'name' => 'edit_roles' ],
            [ 'name' => 'view_permission' ],
            [ 'name' => 'edit_permission' ],
            [ 'name' => 'view_orders' ],
            [ 'name' => 'edit_orders' ],
        ]);
    }
}
