<?php


namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
        'name' => 'HR Admin',
        'email' => 'admin@hrsystem.com',
        'password' => Hash::make('admin123'),
    ]);
    }
}
