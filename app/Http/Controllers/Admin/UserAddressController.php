<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdminStoreAddress;
use App\User;
use App\Address;

class UserAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show($id)
    {
        $addresses = Address::where('user_id', '=', $id)->paginate(5);
        return view('admin.users.address')->with(['addresses' => $addresses, 'id' => $id]);
    }

    public function create($id)
    {
        return view('admin.users.new-address')->with('id', $id);
    }

    public function store(AdminStoreAddress $request)
    {
        $address = Address::create($request->all());
        return redirect()->route('admin.users.index')->with('success', 'Dirección guardada correctamente.');
    }

    public function edit($id)
    {
        $address = Address::find($id);
        return view('admin.users.edit-address')->with('address', $address);
    }

    public function update(Request $request, $id)
    {
        Address::where('id', $id)->update($request->except('_token'));
        return redirect()->route('admin.users.index')->with('success', 'Dirección actualizado correctamente.');
    }

    public function delete($id)
    {
        $user = Address::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Dirección eliminada correctamente.');
    }
}
