<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */


    public function home()
    {
        return view('index');
        // return view('admin.admin_homeInfo');
    }

}
