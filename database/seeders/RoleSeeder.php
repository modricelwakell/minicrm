<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminrole = Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);
        $adminuser = User::where('email', 'me9487374@gmail.com')->first();
        $adminuser?->assignRole('admin');
        $permissions = [
            'delete users',
            'delete clients',
            'delete projects',
            'delete tasks',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }
        $adminrole->syncPermissions($permissions);
        User::doesntHave('roles')->get()->each->assignRole('user');
    }
    
}
