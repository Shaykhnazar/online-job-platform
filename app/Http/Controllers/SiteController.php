<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    /**
     * Show the application main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function main()
    {
        return view('new_test.index');
    }
}
