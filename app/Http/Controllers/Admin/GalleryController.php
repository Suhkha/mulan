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

    public function create()
    {
    	$products = $this->getProducts();
        return view('admin.galleries.new')
        		->with('products', $products);
    } 
}
