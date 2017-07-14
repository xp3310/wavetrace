<?php

namespace App\Http\Controllers\Admin;

use Validator;

use App\Http\Requests;
use Illuminate\Http\Request;

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

    public function edit( $roomId ) {
        $room    = Room::find($roomId);
        $product = Product::find($room->product_id);

        return view('admin.room.edit', [
            'room' 	  => $room,
            'product' => $product,
        ]);
    }

    public function update() {

    }


    // public function store(Requests\StoreRoomRequest $request) {
    public function store(Request $request) {

        $messages = [
            'title.required' => trans('m.required'),
        ];

        $validator = Validator::make($request->all(), [
            'title'        => 'required',
            'max_capicity' => 'required|numeric',
            'price'        => 'required|numeric',
            'holiday_price'=> 'required|numeric',
        ], $messages);

        $error = [];
        foreach ($validator->errors()->messages() as $k=>$v) {
            $error[$k] = join(',', $v);
        }

        if ($validator->fails()) {
            return json_encode(['status' => false, 'extInfo' => ['error' => $error ]]);
        }

        // 以上  其實可以寫在 StoreRoomRequest 中，但不知如何覆寫正確回傳方式，暫定

        if ( !isset($request['roomId']) ) {

            $product = Product::create([
                'title'       => $request['title'],
                'description' => $request['description'],
                'price'       => $request['price'],
                'media_id'       => 1,
                'type'           => 1,
            ]);

            $room = Room::create([
                'max_capicity'     => $request['max_capicity'],
                'more_bed'         => '0',
                'holiday_price'    => $request['holiday_price'],
                'product_id'       => $product->id,
            ]);
        }


        return json_encode(['status' => true, 'msg' => 'ok', 'redirect' => route('admin.room.index')]);
    }


}
