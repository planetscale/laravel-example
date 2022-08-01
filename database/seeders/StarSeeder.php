<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Constellation;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aquarius = Constellation::where('name', 'Aquarius')->first()->id;
        $scorpius = Constellation::where('name', 'Scorpius')->first()->id;

        DB::table('stars')->insert([
            'name' => 'Sadalmelik',
            'constellation_id' => $aquarius,
        ]);

        DB::table('stars')->insert([
            'name' => 'Antares',
            'constellation_id' => $scorpius,
        ]);
    }
}
