<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::factory()->create([
        //     'nama' => 'Martunis',
        //     'nip' => '198008202006041002',
        //     'password' => Hash::make('passdev'),
        //     'level' => 'Admin',
        // ]);

        User::create([
            'nama' => 'Martunis',
            'nip' => '198008202006041002',
            'password' => Hash::make('passdev'),
            'level' => 'Admin',
        ]);
    }
}
