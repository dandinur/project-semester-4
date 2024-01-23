<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'bidan',
            'username' => 'bidan',
            'password' => Hash::make('bidan'),
            'level' => '2',
        ]);
    }
}
