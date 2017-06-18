<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SysConfig extends Model {

	protected $table = 'sys_config';
    protected $fillable = ['value', 'name'];
    public $timestamps = true;

}
