<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(product $product)
    {
        $gallerys = DB::table('galleries')
            ->where('product_id', $product->id)
            ->get();
        return view('back.gallery.index', compact('gallerys', 'product'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $gallery = new gallery();
            $gallery->type = $request->type;
            $gallery->product_id = $request->product_id;

            if ($request->type == 0) {
                $gallery->image = $request->image->store('uploads/gallery');
            } elseif ($request->type == 1) {
                $gallery->video_link = "https://www.youtube.com/embed/". $this->getYouTubeVideoId($request->video_link);
                if (strpos($request->video_link, 'youtube.com') !== false) {
                    $gallery->image = $this->getYouTubeThumbnail($request);
                }
            }

            clearProductInfo($request->product_id);

            $gallery->save();
            return redirect()->back();
        } else {
            return view('back.gallery.index');
        }
    }


    public function getYouTubeThumbnail(Request $request)
    {
        $videoLink = $request->video_link;

        // Extract video ID from the YouTube video link
        $videoId = $this->getYouTubeVideoId($videoLink);

        // Construct the YouTube video thumbnail URL
        $thumbnailUrl = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";

        return $thumbnailUrl;
    }

    private function getYouTubeVideoId($videoLink)
    {
        // Extract video ID from the YouTube video link
        parse_str(parse_url($videoLink, PHP_URL_QUERY), $query);

        return $query['v'] ?? null;
    }

    public function del($gallery)
    {
        $media = DB::table('galleries')->where('id', $gallery)->first(['type', 'image', 'video_link','product_id']);
        clearProductInfo($media->product_id);

        if ($media->type == 0 && !empty($media->image)) {
            // If it's an image, delete the file
            unlink(public_path($media->image));
        }

        DB::table('galleries')->where('id', $gallery)->delete();
        return redirect()->back();
    }
}
