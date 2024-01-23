<?php

namespace Database\Seeders;

use App\Models\balita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BalitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        // balita::truncate();

        DB::table('balita')->insert([
            'nama_balita'=>'aulia',
            'tanggal_lahir'=>'12-12-2003',
            'jenis_kelamin'=>'laki-laki',
        ]);

        DB::table('balita')->insert([
            'nama_balita'=>'durja',
            'tanggal_lahir'=>'12-12-2004',
            'jenis_kelamin'=>'laki-laki',
        ]);
    }
}
