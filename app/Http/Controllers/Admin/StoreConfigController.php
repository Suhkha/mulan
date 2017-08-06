<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StoreConfig;

class StoreConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function edit($id)
    {
        $storeConfig = StoreConfig::find($id);
        return view('admin.store-config.edit')
                ->with('store', $storeConfig);
    }

    public function update(Request $request, $id)
    {
        StoreConfig::where('id', $id)
                ->update($request->except('_token', 'path'));
        // Check if there is a logo in request
        if ($request->hasFile('path')) 
        {
            // First delete old logo
            $storeConfig = StoreConfig::find($id);
            $currentPath = $storeConfig['path'];
            $deletedFile = \Storage::delete($currentPath);
            // Then save the new logo from request
            $logo = $request->file('path')
                            ->store('public');
            StoreConfig::where('id', $id)
                    ->update(array('path' => $logo));
        } 
        return redirect()
                ->route('admin.store-config.edit', ['id' => $id])
                ->with('success', 'Datos de la tienda actualizados correctamente.');
    }
}
