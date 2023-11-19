<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->foreignId('role_id')
            $table->boolean('is_admin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // \DB::table('users')->insert([
        //     [
        //         'name' => 'Test Super Admin',
        //         'email' => 'superadmin@example.com',
        //         'is_admin' => '1',
        //         'password' => bcrypt('12345678'),
        //     ],
        //     [
        //         'name' => 'Test Admin',
        //         'email' => 'admin@example.com',
        //         'is_admin' => '1',
        //         'password' => bcrypt('12345678'),
        //     ],
        //     [
        //         'name' => 'Test User',
        //         'email' => 'user@example.com',
        //         'is_admin' => '0',
        //         'password' => bcrypt('12345678'),
        //     ]
            
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
