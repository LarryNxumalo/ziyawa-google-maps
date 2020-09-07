<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        return Location::all();
    }
}
