<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $viewerRole = Role::create(['name' => 'viewer']);
        $editorRole = Role::create(['name' => 'editor']);
        $readerRole = Role::create(['name' => 'reader']);

        // create permissions
        $viewBooksPermission = Permission::create(['name' => 'view books']);
        $editBooksPermission = Permission::create(['name' => 'edit books']);
        $deleteBooksPermission = Permission::create(['name' => 'delete books']);
        $assignBooksPermission = Permission::create(['name' => 'assign books']);
        $manageUsersPermission =  Permission::create(['name' => 'manage users']);
        $borrowBooksPermission = Permission::create(['name' => 'borrow books']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([
            $viewBooksPermission,
            $editBooksPermission,
            $deleteBooksPermission,
            $manageUsersPermission,
            $assignBooksPermission,
        ]);

        $viewerRole->givePermissionTo($viewBooksPermission);
        $editorRole->givePermissionTo([$editBooksPermission, $assignBooksPermission]);
        $readerRole->givePermissionTo([$viewBooksPermission, $borrowBooksPermission]);
    }
}
