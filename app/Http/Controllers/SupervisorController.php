<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    function index(){

        return view('dashboards.supervisors.index');
    }
}
