<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function LoginAdmin(Request $request)
    {
        $Validatefields = array_map('trim', $request->all());

        Validator::make($Validatefields,[
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only(['name', 'password']))) {
            $request->session()->regenerate();
            return redirect()->route('admin.main')->with('success', 'Login successful');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function LogoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login')->with('success', 'Logout successful');
    }

}
