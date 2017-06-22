@extends('layouts.app-admin')

@include('includes.menu')

@section('inner--layout-admin')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-primary">
	                <div class="panel-heading">@yield('title-admin-section')</div>

	                <div class="panel-body">
	                	@yield('content-admin')
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@show