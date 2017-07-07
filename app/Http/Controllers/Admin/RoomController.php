<?php

namespace App\Http\Controllers\Admin;

use Validator;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Room,
    App\Product,
    App\Media;

class RoomController extends Controller
{
    public function index() {

        $rooms      = [];
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
            'rooms'     => $rooms,
            'products'  => $products
        ]);
    }

    public function create() {

        return view('admin.room.edit');
    }


    public function show() {

    }

    public function edit($roomId) {
        $room    = Room::find($roomId);
        $product = Product::find($room->product_id);

        return view('admin.room.edit', [
            'room' 	  => $room,
            'product' => $product,
        ]);
    }

    public function update() {

    }

    public function store(Request\StoreRoomRequest $request) {

        dd($request);

    }

}
