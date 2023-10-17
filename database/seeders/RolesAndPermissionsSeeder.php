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
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'staff']);
        $viewerRole = Role::create(['name' => 'viewer', 'guard_name' => 'staff']);
        $editorRole = Role::create(['name' => 'editor', 'guard_name' => 'staff']);
        $readerRole = Role::create(['name' => 'reader', 'guard_name' => 'reader']);

        // create permissions
        $editBooksPermission = Permission::create(['name' => 'edit books', 'guard_name' => 'staff']);
        $deleteBooksPermission = Permission::create(['name' => 'delete books', 'guard_name' => 'staff']);
        $assignBooksPermission = Permission::create(['name' => 'assign books', 'guard_name' => 'staff']);
        $manageUsersPermission = Permission::create(['name' => 'manage users', 'guard_name' => 'staff']);
        $borrowBooksPermission = Permission::create(['name' => 'borrow books', 'guard_name' => 'reader']);
        // For the "staff" guard
        $viewBooksPermissionStaff = Permission::create(['name' => 'view books', 'guard_name' => 'staff']);
        // For the "reader" guard
        $viewBooksPermissionReader = Permission::create(['name' => 'view books', 'guard_name' => 'reader']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo([
            $viewBooksPermissionStaff,
            $editBooksPermission,
            $deleteBooksPermission,
            $manageUsersPermission,
            $assignBooksPermission,
        ]);

        $viewerRole->givePermissionTo($viewBooksPermissionStaff);
        $editorRole->givePermissionTo([$viewBooksPermissionStaff, $editBooksPermission, $assignBooksPermission]);
        $readerRole->givePermissionTo([$viewBooksPermissionReader, $borrowBooksPermission]);
    }
}
