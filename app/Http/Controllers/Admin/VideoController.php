<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreVideo;
use App\Video;
use App\Product;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }

    public function index()
    {
        $videos = Video::paginate(5);
        return view('admin.videos.index', compact('videos', $videos));
    }

    public function getProducts()
    {
        return $products = Product::all();
    }

    public function create()
    {
        $products = $this->getProducts(); 
        return view('admin.videos.new')
        		->with('products', $products);
    } 

    public function store(AdminStoreVideo $request)
    {
        $video = Video::create($request->all());
        return redirect()->route('admin.videos.index')
                ->with('success', 'Video guardado correctamente.');
    }

    public function edit($id)
    {   
        $video = Video::find($id);
        $products = $this->getProducts(); 
        return view('admin.videos.edit')
                ->with('video', $video)
                ->with('products', $products);
    }

    public function update(Request $request, $id)
    {
        Video::where('id', $id)
                ->update($request->except('_token'));
        return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video actualizado correctamente.');
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $product_id = $video->product_id; 
        $path = $video['path'];
        \Storage::delete($path);
        $video->delete();
        return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video de producto eliminado correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $video = Video::find($id);
        if ($video != "") 
        {
            $video->status = $video->status ? 0 : 1;
            $video->save();
        }
        return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video actualizado correctamente.');
    }
}
