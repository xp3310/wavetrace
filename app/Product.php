<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';
    protected $guarded = ['id'];
	public $timestamps = true;

}