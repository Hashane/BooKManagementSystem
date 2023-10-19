<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class StaffAPILoginController extends Controller
{
    public function staffLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {

            config(['auth.guards.api.provider' => 'staff']);

            $token = Auth::guard('staff')->user()->createToken('MyApp', ['staff'])->accessToken;

            return response()->json(['token' => $token], 200);
        } else {

            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function staffDashboard()
    {
        return response()->json(Auth::guard('staff')->user());
    }
}
