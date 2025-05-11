<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;
use App\Http\Requests\TargetRequest;

class WeightTargetController extends Controller
{
    public function target(Request $request)
    {
        $user = Auth::user();
        $weightTarget = $user->weightTarget;
        $target_weight = $weightTarget->target_weight;

        return view('target', compact('weightTarget', 'target_weight'));
    }

    public function update(TargetRequest $request, $weightLogId)
    {
        $form = $request->all();
        unset($form['_token']);
        WeightTarget::find($weightLogId)->update($form);
        return redirect('/weight_logs');
    }
}
