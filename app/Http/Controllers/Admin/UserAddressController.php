<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Address;

class UserAddressController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function create($id){
		return view('admin.users.new-address');
	}

	public function show($id){
		$addresses = Address::where('user_id', '=', $id)->paginate(5);
		return view('admin.users.address')->with('addresses', $addresses);
	}
}
