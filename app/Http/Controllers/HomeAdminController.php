<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeAdminController extends Controller
{
    public function index() {
        if (Auth::user()->role == '1') {
            return redirect('/home');
        }
        return view('admin.index');
    }
}
