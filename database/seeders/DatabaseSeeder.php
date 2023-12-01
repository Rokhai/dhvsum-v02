<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityLog;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use App\Models\Category;

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

        \App\Models\User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'is_admin' => '0',
            'password' => bcrypt('12345678'),
        ]);


        // Ratings
        // Code for 4 Stars
        // &#9733; &#9733; &#9733; &#9733; &#9734;
        Rating::create([
            'id' => '1',
            'name' => '1 Star',
            'rating' => '★ ☆ ☆ ☆ ☆',
        ]);
        Rating::create([
            'id' => '2',
            'name' => '2 Stars',
            'rating' => '★ ★ ☆ ☆ ☆',
        ]);
        Rating::create([
            'id' => '3',
            'name' => '3 Stars',
            'rating' => '★ ★ ★ ☆ ☆',
        ]);
        Rating::create([
            'id' => '4',
            'name' => '4 Stars',
            'rating' => '★ ★ ★ ★ ☆',
        ]);
        Rating::create([
            'id' => '5',
            'name' => '5 Stars',
            'rating' => '★ ★ ★ ★ ★',
        ]);

        //  Categories

        Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Category for electronic products',
        ]);

        Category::create([
            'name' => 'Clothing',
            'slug' => 'clothing',
            'description' => 'Category for clothing and apparel',
        ]);

        Category::create([
            'name' => 'Shoes',
            'slug' => 'shoes',
            'description' => 'Category for shoes',
        ]);

        Category::create([
            'name' => 'Beauty & Health',
            'slug' => 'beauty-health',
            'description' => 'Category for beauty and health products',
        ]);

        Category::create([
            'name' => 'Sports & Outdoors',
            'slug' => 'sports-outdoors',
            'description' => 'Category for sports and outdoors products',
        ]);

        Category::create([
            'name' => 'Home & Kitchen',
            'slug' => 'home-kitchen',
            'description' => 'Category for home and kitchen products',
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

        Product::create([
            'user_id' => 3,
            'image' => 'shoes1.jpg',
            'name' => 'Shoes 1',
            'stock' => 10,
            'price' => 1000,
            'description' => 'This black shoes is good for running',
            'category_id' => 3,
            'is_active' => 1,
            'is_approved' => 1,
            
        ]);
        Product::create([
            'user_id' => 3,
            'image' => 'shoes2.jpg',
            'name' => 'Shoes 2',
            'stock' => 10,
            'price' => 100,
            'description' => 'This shoes is good for running',
            'category_id' => 3,
            'is_active' => 1,
            'is_approved' => 1,
            
        ]);
        Product::create([
            'user_id' => 4,
            'image' => 'shoes3.jpg',
            'name' => 'Shoes 3',
            'stock' => 10,
            'price' => 100,
            'description' => 'This shoes is good for running',
            'category_id' => 3,
            'is_active' => 1,
            'is_approved' => 1,
            
        ]);

        Product::create([
            'user_id' => 3,
            'image' => 'shoes4.jpg',
            'name' => 'Shoes 4',
            'stock' => 10,
            'price' => 100,
            'description' => 'This shoes is good for running',
            'category_id' => 3,
            'is_active' => 1,
            'is_approved' => 1,
            
        ]);



        Product::create([
            'user_id' => 4,
            'image' => 'clothe1.jpg',
            'name' => 'Clothe 1',
            'stock' => 10,
            'price' => 100,
            'description' => 'This clothe is good for sleeping',
            'category_id' => 2,
            'is_active' => 1,
            'is_approved' => 1,
            
        ]);


        


        \DB::table('model_has_roles')->insert([
            ['role_id' => '1', 'model_type' => 'App\Models\User', 'model_id' => '1'],
            ['role_id' => '2', 'model_type' => 'App\Models\User', 'model_id' => '2'],
            ['role_id' => '3', 'model_type' => 'App\Models\User', 'model_id' => '3'],
            ['role_id' => '3', 'model_type' => 'App\Models\User', 'model_id' => '4'],
        ]);


        // Address
        \App\Models\Address::create([
            'user_id' => 3,
            'fullname' => 'Rosgen D. Hizer',
            'address' => 'Brgy. 1, Poblacion, San Enrique, Iloilo',
            'contact_number' => '1234567890',
            'email' => \DB::table('users')->where('id', 3)->value('email'),
        ]);
        
        // Activity Logs
        for ($i = 1; $i <= 10; $i++) {
            ActivityLog::create([
                'user_id' => 3,
                'activity' => 'Logged in',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            ActivityLog::create([
                'user_id' => 3,
                'activity' => 'Logged out',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }



        // $this->call(PermissionManagerTableSeeder::class);
    }
}
