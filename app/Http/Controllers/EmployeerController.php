<?php

namespace App\Http\Controllers;

use App\Education;
use Auth;
use Illuminate\Http\Request;

class EmployeerController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('employeers.dashboard');
    }

    public function view_profile()
    {
        $id = Auth::guard('employeer')->user()->id;
        $education = Education::orderBy('passing_year','desc')->where('user_id', '=' , $id)->get();
        return view('users.view_profile', compact('education'));
    }
    public function edit_profile()
    {
        return view('users.edit_profile');
    }
}
