<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Room,
    App\Product,
    App\Media;

class RoomController extends Controller
{
    public function index() {
        
    	$rooms   	= [];
    	$products   = [];
    	$roomQry    = Room::get();
    	$productQry = Product::get();

    	foreach ( $roomQry as $v ) {
    		$rooms[ $v->product_id ] = $v;
    	}

    	foreach ( $productQry as $v ) {
    		$products[ $v->id ] = $v;
    	}


        return view('admin.room.index', [
        	'rooms' 	=> $rooms,
        	'products'  => $products
        ]);
    }

}
