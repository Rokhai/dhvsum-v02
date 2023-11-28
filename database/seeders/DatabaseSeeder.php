<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test Super Admin',
            'email' => 'superadmin@example.com',
            'is_admin' => '1',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'is_admin' => '1',
            'password' => bcrypt('12345678'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => '0',
            'password' => bcrypt('12345678'),
        ]);

        
        // \Backpack\PermissionManager\app\Models\Role::factory()->create([
        //     'name' => 'Super Admin',
        //     'guard_name' => 'web',
        // ]);
        // \Backpack\PermissionManager\app\Models\Role::factory()->create([
        //     'name' => 'Admin',
        //     'guard_name' => 'web',
        // ]);
        // \Backpack\PermissionManager\app\Models\Role::factory()->create([
        //     'name' => 'Student',
        //     'guard_name' => 'web',
        // ]);



        \DB::table('model_has_roles')->insert([
            ['role_id' => '1', 'model_type' => 'App\Models\User', 'model_id' => '1'],
            ['role_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '2'],
            ['role_id' => '3', 'model_type' => 'App\Models\User', 'model_id' => '3'],
        ]);

        // $this->call(PermissionManagerTableSeeder::class);
    }
}
