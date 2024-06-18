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
