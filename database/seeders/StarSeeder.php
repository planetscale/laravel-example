<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stars')->insert([
            'name' => 'Sadalmelik',
            'constellation' => 'Aquarius',
        ]);

        DB::table('stars')->insert([
            'name' => 'Antares',
            'constellation' => 'Scorpius',
        ]);
    }
}
