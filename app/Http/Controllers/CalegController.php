<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalegController extends Controller
{
    function index(){

        return view('dashboards.calegs.index');
    }
}
