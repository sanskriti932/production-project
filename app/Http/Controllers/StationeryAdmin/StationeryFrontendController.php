<?php

namespace App\Http\Controllers\StationeryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StationeryFrontendController extends Controller
{
    public function index(){
        return view('stationeryadmin.index');
    }
}
