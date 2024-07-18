<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $timestamp = Carbon::now();

        DB::table('users')->insert([
            [
                'name' => 'Admin Tes',
                'email' => 'admintes@gmail.com',
                'password' => Hash::make('admin'),
                'id_user_roles' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ]);


        DB::table('users_role')->insert([
            ['role' => 'Admin'],
            ['role' => 'User'],
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
