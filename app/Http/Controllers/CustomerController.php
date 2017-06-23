<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
    	return view('admin.customers.index');
    }

    public function create(){
    	return view('admin.customers.new');
    }
}
