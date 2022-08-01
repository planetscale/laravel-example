<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstellationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('constellations')->insert([
            'name' => 'Aquarius',
        ]);

        DB::table('constellations')->insert([
            'name' => 'Scorpius',
        ]);
    }
}
