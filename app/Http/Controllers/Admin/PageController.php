<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePage;
use App\Page;

class PageController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pages = Page::paginate(5);
        return view('admin.pages.index', compact('pages', $pages));
    }

    public function create()
    {
        return view('admin.pages.new');
    }

    public function store(AdminStorePage $request)
    {
        $page = Page::create($request->all());
        return redirect()->route('admin.pages.index')
                ->with('success', 'Página creada correctamente.');
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.pages.edit')
                ->with('page', $page);
    }

    public function update(Request $request, $id)
    {
        Page::where('id', $id)
                ->update($request->except('_token'));
        return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Página actualizada correctamente.');
    }

    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Página eliminada correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $page = Page::find($id);
        if ($page != "") 
        {
            $page->position = $page->position ? 0 : 1;
            $page->save();
        }
        return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Página actualizada correctamente.');
    }
}
