<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VaksinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Schema::enableForeignKeyConstraints();

        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Hepatitis B'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'BCG'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Polio tetes 1'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'DPT-HB-Hib'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Polio tetes 2'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'PCV 1'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'DPT-HB-Hib 2'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Polio tetes 3'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'PCV 2'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'DPT-HB-Hib 3'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Polio tetes 4'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Polio Suntik (IPV)'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'Campak-Rubella'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'JE'
        ]);
        DB::table('vaksin')->insert([
            'jenis_vaksin' => 'PCV 3'
        ]);
    }
}
