<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::firstOrcreate(['name' => 'admin']);
        Role::firstOrcreate(['name' => 'user']);

        // Menambahkan permission
        Permission::firstOrcreate(['name' => 'controll panels']);
        Permission::firstOrcreate(['name' => 'controll users']);

        $admin = User::firstOrCreate([
            'name' => 'Rosyamdani',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}
