<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// use MediaItem;

class MediaItem extends Model {

	protected $table = 'media_item';
	public $timestamps = true;

	public static function reorder($mediaId) {

        $mediaId = intval($mediaId);
	    $mediaItem = MediaItem::where('media_id', $mediaId)
                                ->orderBy('sn', 'asc')
                                ->get();
        $sn = 0;
        foreach($mediaItem as $item) {
            $sn+=10;
            $item->sn = $sn;
            $item->save();
        }

	}
}
