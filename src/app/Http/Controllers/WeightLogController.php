<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Http\Requests\RegisterModalRequest;
use App\Models\WeightTarget;



class WeightLogController extends Controller
{
    public function index()
    {
        $weightLogs = WeightLog::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(8);
        $weightTarget = WeightTarget::where('user_id', Auth::id())->first();

        return view('index', compact('weightLogs', 'weightTarget'));
    }

    public function store(RegisterModalRequest $request)
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

    public function show($id)
    {
        $weightLogs = WeightLog::findOrFail($id);
        return view('show', compact('weightLogs'));
    }

    public function search(Request $request)
    {
        $weightLogs = WeightLog::where('user_id', Auth::id())
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->orderBy('date', 'desc')->paginate(8);

        return view('index', compact('weightLogs'));
    }

    public function update(RegisterModalRequest $request, $weightLogId)
    {
        $form = $request->all();
        unset($form['_token']);
        WeightLog::find($weightLogId)->update($form);
        return redirect('/weight_logs');
    }
}
