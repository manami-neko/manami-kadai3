<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Step2Request;
use App\Http\Requests\Step1Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function step1(Step1Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('register/step2');
    }

    public function showStep2(Request $request)
    {
        return view('auth.register.step2');
    }

    public function step2(Step2Request $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'weight' => $request->weight,
            'date' => Carbon::now()->toDateString(),
        ]);
        $weightTarget = WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight,
        ]);

        $weightLogs = WeightLog::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(8);

        return view('index', compact('weightLogs', 'weightTarget'));
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }
}
