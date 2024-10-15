<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * 
     * INDEX ROUTE
     * 
     */
    public function dashboard()
    {
        return view('pages.index');
    }

    /**
     * 
     * TEST ROUTE
     * 
     */
    public function test()
    {
        return view('pages.test');
    }
}
