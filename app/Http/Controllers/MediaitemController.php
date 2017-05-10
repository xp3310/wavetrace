<?php

namespace App\Http\Controllers;

// use App\User;
use App\Http\Controllers\Controller;
use App\Media;
use App\MediaItem;
use Storage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class MediaitemController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy(Request $request, $id) {
        $mediaItem = MediaItem::where('id', $id)->first();
        $media = Media::where('id', $mediaItem['media_id'])->first();

        $mediaPath = storage_path('app/public/sysdata/').$media['path'];

        @unlink("{$mediaPath}/{$mediaItem->file_name}.{$mediaItem->file_type}");
        @unlink("{$mediaPath}/thumb/{$mediaItem->file_name}_l.png");
        @unlink("{$mediaPath}/thumb/{$mediaItem->file_name}_m.png");
        @unlink("{$mediaPath}/thumb/{$mediaItem->file_name}_s.png");

        MediaItem::where('id', $id)->delete();
        MediaItem::reorder($media->id);

        echo json_encode(['status' => 'true', 'msg' => 'ok', 'extInfo' => []]);
    }

    public function edit($id) {
        $mediaItem = MediaItem::where('id', $id)->first();
        return view('admin.admin_mediaItemEdit', ['mediaItem' => $mediaItem,
                                                  'updateUrl' => route('media_item.update', [$id]),
                                                  'redirUrl' => route('media.edit', [$mediaItem->media_id])]);
    }

    public function update(Request $request, $id) {
        MediaItem::where('id', $id)->update($request->all());
        echo json_encode( ['status' => 'truee', 'msg' => 'ok', 'extInfo' => []]);
    }


    public function move(Request $request)
    {
        $input = $request->all();

        $mediaItem = MediaItem::where('id', $input['itemId'])->first();
        $mediaItemAfter = MediaItem::where('id', $input['afterId'])->first();

        $mediaItem->sn = ($mediaItemAfter) ? $mediaItemAfter->sn+5 : 5;
        $mediaItem->save();
        MediaItem::reorder($mediaItem->media_id);
    }

}
