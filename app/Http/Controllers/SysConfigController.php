<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use App\SysConfig;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class SysConfigController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy(Request $request, $id) {

    }

    public function edit($id) {

    }

    public function updateAll(Request $request) {
        $request = $request->all();

        foreach ($request as $k => $v) {
            if ($k == 'contactInfo') {
                $v = json_encode($v);
            }
            if ($k == 'socialInfo') {
                $v = json_encode($v);
            }

            SysConfig::updateOrCreate(['name' => $k],
                                      ['name' => $k, 'value' => $v]);
        }
        echo json_encode( ['status' => 'true', 'msg' => 'ok', 'extInfo' => []]);
    }

    public function validField(Request $request) {
        // $request = $request->all();

        // foreach ($request as $k => $v) {
        //     if ($k == 'contactInfo') {
        //         $v = json_encode($v);
        //     }
        //     if ($k == 'socialInfo') {
        //         $v = json_encode($v);
        //     }

        //     SysConfig::updateOrCreate(['name' => $k],
        //                               ['name' => $k, 'value' => $v]);
        // }
        // echo json_encode( ['status' => 'true', 'msg' => 'ok', 'extInfo' => []]);
    }



}
