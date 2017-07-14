<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product,
    App\Media,
    App\MyLib;

class ProductController extends Controller
{
    public function index() {

    	$products   = [];
    	$productQry = Product::where('type', '!=', MyLib::$room)->get();

    	foreach ( $productQry as $v ) {
    		$products[ $v->id ] = $v;
    	}


        return view('admin.product.index', [
        	'products'  => $products
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
