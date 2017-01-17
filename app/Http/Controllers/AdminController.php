<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function home()
    {
        return view('admin.admin_homeInfo');
    }
    public function show() {
        return view('admin.admin_template');
    }
}
