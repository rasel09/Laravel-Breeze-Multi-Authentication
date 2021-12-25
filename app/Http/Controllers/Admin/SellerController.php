<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    // ------------------------------------ Seller login form ----------------------------
    public function index()
    {
        return view('seller.seller_login');
    }
    // ------------------------------- SellerDashbord ----------------------------
    public function dashbord()
    {
        return view('seller.index');
    }
    // ------------------------------- Seller login -------------------------

    public function login(Request $request)
    {

        $check = $request->all();
        if (Auth::guard('seller')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('seller.dashbord');
        } else {
            return redirect()->back()->with('error', 'Invailed Email or Password');
        }
    }

    /// ---------------------------------- Seller logout -----------------------------
    public function sellerLogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller_login_form')->with('error', 'Seller Logout successfully');
    }
}