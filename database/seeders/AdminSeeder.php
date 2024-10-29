<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'admin')->first();
        User::factory()->create([
            'name' => 'Misael Rivera',
            'email' => 'misaelrivera@laigsa.com'
        ])->assignRole($role);
    }
}
