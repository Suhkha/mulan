<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Product;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }

    public function create($id)
    {
    	$product = Product::find($id);
        return view('admin.videos.new')
        		->with('product', $product);
    } 

    public function store(Request $request)
    {
        $paths = $request->file('path');
        foreach ($paths as $path) 
        {
            $path_video = $path->store('public');
            $info_extension = pathinfo($path_video, PATHINFO_EXTENSION);
            $extension  = ($info_extension == "ogv") ? "ogg" : $info_extension;

            $video = new Video;
            $video->product_id = $request->product_id;
            $video->path = $path_video;
            $video->type = $extension;
            $video->save();
        }
        return "true";
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $product_id = $video->product_id; 
        $path = $video['path'];
        \Storage::delete($path);
        $video->delete();
        return redirect()
                ->route('admin.products.show', ['id' => $product_id])
                ->with('success', 'Video de producto eliminado correctamente.');
    }
}
