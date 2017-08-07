<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', '=', $slug)->first();
        return view('page.index', compact('page', $page));
    }
}
