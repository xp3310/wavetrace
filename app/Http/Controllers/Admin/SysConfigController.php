<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SysConfig,
    App\Media,
    App\MyLib;

class SysConfigController extends Controller
{
    public function index() {

    	$sysCfgObj = SysConfig::all();

        $socialInfoDefault = array();

        foreach ( config('myConst.socialTypes') as $type ) {
            $socialInfoDefault[] = array('type' => $type, 'label' => trans("admin.social_{$type}"), 'value' => '');
        }
        $defaultInfo = ['siteName' => '',
                        'copyright' => '',
                        'contactInfo' => json_encode( array( array('label' => trans('phone'), 'value' => ''),
                                                             array('label' => trans('email'), 'value' => '') ) ),
                        'socialInfo' => json_encode( $socialInfoDefault )
                       ];
        $ret = array();
        foreach($sysCfgObj as $cfg) {
            $ret[ $cfg->name ] = $cfg->value;
        }
        $ret = array_merge($defaultInfo, $ret);
        $ret['contactInfo'] = json_decode($ret['contactInfo'], TRUE);
        $ret['socialInfo'] = json_decode($ret['socialInfo'], TRUE);


        return view( 'admin.sysConfig.index', ['sysConfig' => $ret, 'updateUrl' => route('admin.sys_config.store')] );
    }

    public function edit() {

    }

    public function update() {

    }

    public function store(Request $request) {
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

}
