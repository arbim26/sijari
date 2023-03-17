<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartaiController extends Controller
{
    function index(){

        return view('dashboards.admins.partais.index');
    }
}
