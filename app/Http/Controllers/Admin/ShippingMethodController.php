<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreShippingMethod;
use App\ShippingMethod;

class ShippingMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shippings = ShippingMethod::paginate(5);
        return view('admin.shipping-methods.index', compact('shippings', $shippings));
    }

    public function create()
    {
        return view('admin.shipping-methods.new');
    }

    public function store(AdminStoreShippingMethod $request)
    {
        $shipping = ShippingMethod::create($request->all());
        return redirect()->route('admin.shipping-methods.index')
                ->with('success', 'Método de envío guardado correctamente.');
    }

    public function edit($id)
    {
        $shipping = ShippingMethod::find($id);
        return view('admin.shipping-methods.edit')
                ->with('shipping', $shipping);
    }

    public function update(Request $request, $id)
    {
        ShippingMethod::where('id', $id)
                ->update($request->except('_token'));
        return redirect()
                ->route('admin.shipping-methods.index')
                ->with('success', 'Método de envío actualizado correctamente.');
    }

    public function delete($id)
    {
        $shipping = ShippingMethod::find($id);
        $shipping->delete();
        return redirect()
                ->route('admin.shipping-methods.index')
                ->with('success', 'Método de envío eliminado correctamente.');
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $shipping = ShippingMethod::find($id);
        if ($shipping != "") 
        {
            $shipping->status = $shipping->status ? 0 : 1;
            $shipping->save();
        }
        return redirect()
                ->route('admin.shipping-methods.index')
                ->with('success', 'Método de envío actualizado correctamente.');
    }
}
