<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;


class WeightLogController extends Controller
{
    public function index()
    {
        $weightLogs = WeightLog::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(8);

        return view('index', compact('weightLogs'));
    }

    public function store(Request $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'weight' => $request->weight,
            'date' => $request->date,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        $weightLogs = WeightLog::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(8);

        return view('index', compact('weightLogs'));
    }
}
