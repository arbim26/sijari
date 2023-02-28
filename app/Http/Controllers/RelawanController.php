<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelawanController extends Controller
{
    function index(){

        return view('dashboards.relawans.index');
    }
}
