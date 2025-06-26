<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Taufiq Pop',
            'email' => 'taufiqpop999@gmail.com',
            'username' => 'taufiqpop',
            'password' => Hash::make('hutaowangy'),
            'real_password' => 'hutaowangy',
            'created_at' => Carbon::now()
        ]);

        // factory(User::class, 5)->create();
    }
}
