<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role_as == '1') {
            $users = DB::table('users')->get();
            return view('admin/dashboard', compact('users'));
        } else {
            return redirect('/home')->with('error', 'You are not authorized to access this page');
        }
    }
}
