<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;


class WeightLogController extends Controller
{
    public function index()
    {
        $weightLog = WeightLog::where('user_id', Auth::id())->orderBy('date', 'desc')->get();

        return view('index', compact('weight_log'));
    }
}
