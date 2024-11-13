<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $pegawai = Pegawai::factory(20)->make();
        // $users = User::factory(random_int(1, 5))->create(['role' => 'manajer']);


        // foreach ($pegawai as $index => $p) {
        //     $p->user_id = $users[$index % $users->count(1)]->user_id;
        //     $p->save(); 
        // }

        

        \App\Models\User::factory()->create([
            'nama' => 'Test User',
            'email' => 'test@example.com',
            'password' => 12345678,
            'role' => 'admin'
        ]);
    }
}
