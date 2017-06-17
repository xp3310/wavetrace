<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SysConfig;

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
        return view('admin.index');
        // return view('admin.admin_homeInfo');
    }

    public function show() {
        return view('admin.index');
    }

    public function siteInfo() {
        $sysCfgObj = SysConfig::all();

        $defaultInfo = ['siteName' => '',
                        'copyright' => '',
                        'contactInfo' => '',
                        'socialInfo' => ''
                       ];
        $ret = array();
        foreach($sysCfgObj as $cfg) {
            $ret[ $cfg->name ] = $cfg->value;
        }
        $ret = array_merge($defaultInfo, $ret);
        $ret['contactInfo'] = json_decode($ret['contactInfo'], TRUE);
        $ret['socialInfo'] = json_decode($ret['socialInfo'], TRUE);

        return view( 'admin.siteInfo', ['sysConfig' => $ret, 'updateUrl' => action('SysConfigController@updateAll')] );
    }

}
