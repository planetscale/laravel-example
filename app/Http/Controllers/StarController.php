<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Check if database is connected and get all data from stars
        // table if so.
        try {
            \DB::connection()->getPdo();
            
            if (\DB::connection()->getPdo()) {
                $db_connected = \DB::connection()->getDatabaseName();
                $stars = Star::all();
                // $stars = [];
            }
        } catch (\Exception $e) {
            $db_connected = false;
            $stars = [];
        }

        return view('home', compact('stars', 'db_connected'));
    }
}
