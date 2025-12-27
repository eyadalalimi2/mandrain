<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['phone' => '780181825'], // Unique identifier
            [
                'name' => 'الأدمن الرئيسي',
                'password' => Hash::make('admin'),
                'avatar' => 'admin/images/default-avatar.png',
                'role' => 'سوبر أدمن',
                'is_active' => true,
            ]
        );
    }
}
