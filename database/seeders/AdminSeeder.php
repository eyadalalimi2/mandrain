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
        Admin::create([
            'name' => 'الأدمن الرئيسي',
            'phone' => '780181825',
            'password' => Hash::make('admin'),
            'avatar' => '/admin/images/default-avatar.png',
            'role' => 'super_admin',
            'is_active' => true,
        ]);
    }
}