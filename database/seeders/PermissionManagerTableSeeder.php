<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use App\Models\User;

class PermissionManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        collect([ // tables
            'users',
            'roles',
        ])
            ->crossJoin([ // levels
                'see',
                'edit',
            ])
            ->each(
                fn (array $item) => Permission::firstOrCreate([
                    'name' => implode('.', $item),
                ])
                    ->save()
            )
            //
        ;
        User::first()
            ->givePermissionTo(['users.edit']);
    }
}
