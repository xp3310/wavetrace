<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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

    public function create() {
        return view('admin.product.edit');
    }

}
