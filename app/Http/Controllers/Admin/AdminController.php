<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // ------------------------------------ Admin login form ----------------------------
    public function index()
    {
        return view('admin.admin_login');
    }
    // ------------------------------- Admin Dashbord ----------------------------
    public function dashbord()
    {
        return view('admin.index');
    }
    // ------------------------------- Admin login -------------------------

    public function login(Request $request)
    {
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashbord');
        } else {
            return redirect()->back()->with('error', 'Invailed Email or Password');
        }
    }

    /// ---------------------------------- Admin logout -----------------------------
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Admin Logout successfully');
    }
}