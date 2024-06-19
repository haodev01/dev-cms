<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
  /**
   * Create the initial roles and permissions.
   */
  public function run(): void
  {
    // Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();


    $role = Role::create(['name' => 'admin_system']);
    // User
    $permission = Permission::create(['name' => 'create_user']);
    $permission = Permission::create(['name' => 'edit_user']);
    $permission = Permission::create(['name' => 'delete_user']);
    $permission = Permission::create(['name' => 'view_user']);

    // tag
    $permission = Permission::create(['name' => 'create_tag']);
    $permission = Permission::create(['name' => 'edit_tag']);
    $permission = Permission::create(['name' => 'delete_tag']);
    $permission = Permission::create(['name' => 'view_tag']);

    // category
    $permission = Permission::create(['name' => 'create_category']);
    $permission = Permission::create(['name' => 'edit_category']);
    $permission = Permission::create(['name' => 'delete_category']);
    $permission = Permission::create(['name' => 'view_category']);

    // article
    $permission = Permission::create(['name' => 'create_article']);
    $permission = Permission::create(['name' => 'edit_article']);
    $permission = Permission::create(['name' => 'delete_article']);
    $permission = Permission::create(['name' => 'view_article']);

    // permission
    $permission = Permission::create(['name' => 'create_permission']);
    $permission = Permission::create(['name' => 'edit_permission']);
    $permission = Permission::create(['name' => 'delete_permission']);
    $permission = Permission::create(['name' => 'view_permission']);

    // permission
    $permission = Permission::create(['name' => 'create_role']);
    $permission = Permission::create(['name' => 'edit_role']);
    $permission = Permission::create(['name' => 'delete_role']);
    $permission = Permission::create(['name' => 'view_role']);
    // gets all permissions via Gate::before rule; see AuthServiceProvider

    $user = Admin::factory()->create([
      'name' => 'supperadmin',
      'username' => 'supperadmin',
      'email' => 'superadmin@gmail.com',
      'password' => Hash::make('123456')
    ]);
    $user->assignRole($role);
  }
}
