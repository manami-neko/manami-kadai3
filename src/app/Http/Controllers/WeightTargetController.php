<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightTargetController extends Controller
{
    public function target()
    {
        return view('target');
    }

    public function update() {}
}
