<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCategory;
use App\Category;

class CategoryController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
		$categories = Category::paginate(5);
		return view('admin.categories.index', compact('categories', $categories));
	}

	public function create(){
		return view('admin.categories.new');
	}

	public function store(AdminStoreCategory $request){
		$category = Category::create($request->all());
		return redirect()->route('admin.categories.index')->with('success', 'Categoría guardada correctamente.');
	}

	public function edit($id){
		$category = Category::find($id);
		return view('admin.categories.edit')->with('category', $category);
	}

	public function update(Request $request, $id){
		Category::where('id', $id)->update($request->except('_token'));
		return redirect()->route('admin.categories.index')->with('success', 'Categoría actualizada correctamente.');
	}

	public function delete($id){
		$category = Category::find($id);
		$category->delete();
		return redirect()->route('admin.categories.index')->with('success', 'Categoría eliminada correctamente.');
	}

	public function status($id){
	            return "hola";
	            
	            // $category = Category::find($id);
	 		
	            // if($category != "") {
	            //     $category->status = $category->status ? 0 : 1;
	            //     $category->save();
	            // }
	            // return redirect()->route('admin.categories.index');
	        }

}
