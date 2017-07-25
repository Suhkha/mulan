<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, ['locale' => 'required|in:es,en']);

        \Session::put('locale', $request->locale);
        \Session::save();

        return redirect()->back();
    }
}
