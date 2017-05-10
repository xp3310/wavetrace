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

use Redirect;



class MediaController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

// page route
    public function home()
    {
        return view('admin.admin_homeInfo');
    }

    public function create() {
        $hasPermission = TRUE;
        if ($hasPermission) {

            $folderName = md5(md5(uniqid()));
            $folderPath = storage_path('app/public/sysdata/media/') . "{$folderName}";
            @mkdir($folderPath);

            $media = new Media();
            $media->path = $folderName;
            $media->save();

            return Redirect::route('media.edit', array($media->id));
        }
    }

    public function edit($id) {
        $media = Media::where('id', $id)->first();
        $mediaItem = MediaItem::where('media_id', $id)
                                ->orderBy('sn', 'asc')
                                ->get();
        $ret = array();
        foreach ($mediaItem as $item) {
            $url = Storage::url( "sysdata/media/{$media->path}/thumb/{$item->file_name}_s.png" );

            $ret[] = array('id' => $item->id,
                           'name' => $item->file_name,
                           'deleteUrl' => route('media_item.destroy', [$item->id]),
                           'editUrl' => route('media_item.edit', [$item->id]),
                           'src' => $url);
        }

        return view('admin.admin_mediaEdit', ['ret' => $ret, 'mediaId' => $id]);
    }

    public function delete($id) {

    }



    public function upload(Request $request, $mediaId)
    {
        $media = Media::where('id', $mediaId)->first();
        $mediaItemMaxSn = MediaItem::where('media_id', $mediaId)->max('sn');
        $files = $request->file('media');
        // Log::info($request->hasFile('media'));

        $createMediaItem =  array();
        $imgFile = array();
        foreach ($files as $file) {
            $uniqName = substr( md5(uniqid()) , 0, 4).date('s');
            $storePath = storage_path('app/public/sysdata/').$file->storeAs("media/{$media['path']}", "{$uniqName}.{$file->guessExtension()}", 'sysdata');



            $mediaItemMaxSn += 10;
            $createMediaItem[] = ['media_id' => $mediaId,
                                  'title' => $file->getClientOriginalName(),
                                  'description' => '',
                                  'file_name' => $uniqName,
                                  'file_origin_name' => $file->getClientOriginalName(),
                                  'file_type' => $file->guessExtension(),
                                  'sn' => $mediaItemMaxSn
                                 ];


            if(substr($file->getMimeType(), 0, 5) == 'image') {
                $imgFile[] = ['folder' => storage_path('app/public/sysdata/media/') . $media['path'],

                              'filename' => $uniqName,
                              'ext' => $file->guessExtension()
                ];
            }
        }
        MediaItem::insert($createMediaItem);
echo json_encode([ 'status'=>'true', 'msg' => 'ok' ]);
        ignore_user_abort(true);
        set_time_limit(0);

        $this->resizeImgs($imgFile);
    }

    private function resizeImgs($files = array(), $sizes=array()) {
        $defaultSize = ['l' => [1920, 1080],
                        'm' => [1280, 720],
                        's' => [320, 180]
        ];

        $sizes = array_merge($defaultSize, $sizes);
        $sizes = array_intersect_key($sizes, $defaultSize);

        foreach($files as $file) {
            @mkdir("{$file['folder']}/thumb", '0777', TRUE);

            foreach($sizes as $k => $size) {
                $img = Image::make("{$file['folder']}/{$file['filename']}.{$file['ext']}")->fit($size[0], $size[1]);
                $img->save("{$file['folder']}/thumb/{$file['filename']}_{$k}.png");
            }

        }

    }

}
