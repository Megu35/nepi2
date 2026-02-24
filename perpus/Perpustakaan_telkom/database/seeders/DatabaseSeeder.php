<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        User::create(
            [
            'id' => 0,
            'school_id' => 0,
            'name' => 'ADMIN PERPUSTAKAAN',
            'class' => '',
            'major' => '',
            'username' => 'admin_perpustakaan',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'email' => 'perpustakaan@smktelkom-jk.sch.id',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        );
    }
}
