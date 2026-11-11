<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'me9487374@gmail.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => 'password',
            ]
        );

        User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
