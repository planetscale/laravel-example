<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Star;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if database is connected. If connected, check if stars
        // table has been created. If so, get all data from stars table
        try {
            \DB::connection()->getPdo();

            $db_connected = \DB::connection()->getDatabaseName();
            if (Schema::hasTable('stars'))
                $stars = Star::all();
            else
                $stars = [];
        } catch (\Exception $e) {
            $db_connected = false;
            $stars = [];
        }

        return view('home', compact('stars', 'db_connected'));
    }
}
