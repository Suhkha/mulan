<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Product;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }

    public function create($id)
    {
    	$product = Product::find($id);
        return view('admin.galleries.new')
        		->with('product', $product);
    } 

    public function store(Request $request)
    {
        $paths = $request->file('path');
        foreach ($paths as $path) 
        {
            $path_image = $path->store('jajkiassets','s3');
            $image = new Gallery;
            $image->product_id = $request->product_id;
            $image->path = $path_image;
            $image->save();
        }
        return "true";
    }

    public function delete($id)
    {
        $image = Gallery::find($id);
        $product_id = $image->product_id; 
        $path = $image['path'];
        \Storage::delete($path);
        $image->delete();
        return redirect()
                ->route('admin.products.show', ['id' => $product_id])
                ->with('success', 'Imagen de producto eliminada correctamente.');
    }
}
