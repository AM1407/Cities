<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities-index', compact('cities'));
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return view('cities-show', compact('city'));
    }

    public function byContinent($continent)
    {
        $cities = City::where('continent', $continent)->get();
        return view('cities-index', compact('cities'));
    }

    public function topTouristDestinations()
    {
        $cities = City::where('top_tourist_destination', true)->get();
        return view('cities-index', compact('cities'));
    }
}
