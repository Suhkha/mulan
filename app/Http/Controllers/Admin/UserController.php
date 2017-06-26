<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdminStoreUser;
use App\User;
use Mail;
use App\Mail\AdminSendProvisionalPassword;

class UserController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
		$users = User::all();
		return view('admin.users.index', compact('users', $users));
    }


    public function create(){
    	return view('admin.users.new');
    }

    public function store(AdminStoreUser $request){
    	$user = User::create($request->all());

        Mail::to($user)->send(new AdminSendProvisionalPassword($user));

    	return redirect()->route('admin.users.index');
    }
}
