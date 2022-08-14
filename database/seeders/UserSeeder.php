<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'first_name' => 'editor',
            'last_name' => 'editor',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'viewer',
            'email' => 'viewer@viewer.com',
            'first_name' => 'viewer',
            'last_name' => 'viewer',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 3,
        ]);
    }
}
