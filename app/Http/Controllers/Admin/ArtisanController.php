<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreArtisan;
use App\Artisan;

class ArtisanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $artisans = Artisan::paginate(5);
        return view('admin.artisans.index', compact('artisans', $artisans));
    }

    public function create()
    {
        return view('admin.artisans.new');
    }

    public function store(AdminStoreArtisan $request)
    {
        $artisan = Artisan::create($request->except('photo'));
        $id = $artisan->id;      
        $path = $request->file('photo')
                        ->store('public');
        Artisan::where('id', $id)
                ->update(array('photo' => $path));
        return redirect()->route('admin.artisans.index')
                        ->with('success', 'Artesano guardado correctamente.');
    }

    public function edit($id)
    {
        $artisan = Artisan::find($id);
        return view('admin.artisans.edit')
                ->with('artisan', $artisan);
    }

    public function update(Request $request, $id)
    {
        Artisan::where('id', $id)
                ->update($request->except('_token', 'photo'));
        // Check if there is a photo in request
        if ($request->hasFile('photo')) 
        {
            // First delete old photo
            $artisan = Artisan::find($id);
            $currentPath = $artisan['photo'];
            $deletedFile = \Storage::delete($currentPath);
            // Then save the new photo from request
            $path = $request->file('photo')
                            ->store('public');
            Artisan::where('id', $id)
                    ->update(array('photo' => $path));
        } 
        return redirect()
                ->route('admin.artisans.index')
                ->with('success', 'Artesano actualizado correctamente.');
    }

    public function delete($id)
    {
        $artisan = Artisan::find($id);
        $path = $artisan['photo'];
        \Storage::delete($path);
        $artisan->delete();
        return redirect()
                ->route('admin.artisans.index')
                ->with('success', 'Artesano eliminado correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $artisan = Artisan::find($id);
        if ($artisan != "") 
        {
            $artisan->artisan_of_month = $artisan->artisan_of_month ? 0 : 1;
            $artisan->save();
        }
        return redirect()
                ->route('admin.artisans.index')
                ->with('success', 'Artesano actualizado correctamente.');
    }
}
