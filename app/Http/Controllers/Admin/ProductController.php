<?php

namespace App\Http\Controllers\Admin;

use Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product,
    App\Media,
    App\MediaItem,
    App\MyLib;

class ProductController extends Controller
{
    public function index() {

        $items      = [];
        $medias     = [];
        $mediaIds   = [];
    	$products   = [];


    	$productQry = Product::where('type', '!=', MyLib::$room)->get();

    	foreach ( $productQry as $v ) {
    		$products[ $v->id ] = $v;
            $mediaIds[] = $v->media_id;
    	}

        $mediaQry = Media::whereIn('id', $mediaIds)->get();
        $itemQry  = MediaItem::whereIn('media_id', $mediaIds)->get();

        foreach ($mediaQry as $v) {
            $medias[ $v->id ] = $v;
        }


        foreach ($itemQry as $v) {
            $items[ $v->media_id ] = Storage::url( "sysdata/media/".$medias[ $v->media_id ]->path ."/thumb/{$v->file_name}_s.png" );
        }

        return view('admin.product.index', [
            'products'  => $products,
        	'items'     => $items,
        ]);
    }

    public function edit( $id ) {

        $product = Product::find($id);

        return view('admin.product.edit', [
            'product' => $product
        ]);
    }

    public function update() {

    }

    public function create(Request $request) {
        return view('admin.product.edit');
    }

    public function store(Request $request) {

        if ( !isset($request['id']) ) {

            $product = Product::create([
                'title'       => $request['title'],
                'description' => $request['description'],
                'price'       => $request['price'],
                'media_id'       => 1,
                'type'           => 2,
            ]);

        }

        return json_encode(['status' => true, 'msg' => 'ok', 'redirect' => route('admin.product.index')]);
    }

}
