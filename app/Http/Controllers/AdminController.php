<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SysConfig;
use Illuminate\Support\Facades\Log;


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
// my_print_var($ret);



        $myForm = array('id' => 'siteInfoForm',
                        'field' => ['siteName' => ['label' => trans('admin.siteName'),
                                                   'type' => 'text',
                                                   'name' => 'siteName',
                                                   'value' => $ret['siteName']],

                                    'copyright' => ['label' => trans('admin.copyright'),
                                                    'type' => 'text',
                                                    'name' => 'copyright',
                                                    'value' => $ret['copyright']],

                                    'contactInfo' => ['label' => trans('admin.contactInfo'),
                                                      'type' => 'textPair',
                                                      'name' => 'contactInfo',
                                                      'value' => $ret['contactInfo']],

                                    'socialInfo' => ['label' => trans('admin.socialInfo'),
                                                     'type' => 'textPair',
                                                     'name' => 'socialInfo',
                                                     'value' => $ret['socialInfo']]
                                   ],

                        'submitUrl' => action('SysConfigController@updateAll'),
                        'validUrl' => action('SysConfigController@validField'));

        return view( 'admin.siteInfo', ['myForm' => $myForm] );
    }

}
