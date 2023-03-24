<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = Masyarakat::get();
        return view('dashboards.masyarakats.index', compact('data'));
    }
}
