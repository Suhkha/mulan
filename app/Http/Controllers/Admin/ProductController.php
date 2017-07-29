<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreProduct;
use App\Product;
use App\Artisan;
use App\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products', $products));
    }

    public function create()
    {
        $artisans = Artisan::all();
        $categories = Category::all();
        
        return view('admin.products.new')
                ->with('artisans', $artisans)
                ->with('categories', $categories);
    }

    public function store(AdminStoreProduct $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('admin.products.index')
                ->with('success', 'Categoría guardada correctamente.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')
                ->with('category', $product);
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)
                ->update($request->except('_token'));

        return redirect()
                ->route('admin.products.index')
                ->with('success', 'Categoría actualizada correctamente.');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()
                ->route('admin.products.index')
                ->with('success', 'Categoría eliminada correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        if ($product != "") {
            $product->status = $product->status ? 0 : 1;
            $product->save();
        }

        return redirect()
                ->route('admin.products.index')
                ->with('success', 'Categoría actualizada correctamente.');
    }
}
