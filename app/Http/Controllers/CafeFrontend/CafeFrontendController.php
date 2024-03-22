<?php

namespace App\Http\Controllers\CafeFrontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CafeFrontendController extends Controller
{
    public function index(){
        return view('cafefrontend.index');
    }
}
