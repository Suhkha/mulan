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

    public function getProducts()
    {
        return $products = Product::all();
    }

    public function create($id)
    {
    	$product = Product::find($id);
        return view('admin.galleries.new')
        		->with('product', $product);
    } 

    public function store(Request $request)
    {
        $paths = $request->file('photo');
        foreach ($paths as $path) 
        {
            $path_photo = $path->store('public');
            $gallery = new Gallery;
            $gallery->product_id = $request->product_id;
            $gallery->photo = $path_photo;
            $gallery->save();
        }
        return "true";
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        $product_id = $gallery->product_id; 
        $path = $gallery['photo'];
        \Storage::delete($path);
        $gallery->delete();
        return redirect()
                ->route('admin.products.show', ['id' => $product_id])
                ->with('success', 'Imagen de producto eliminada correctamente.');
    }
}
