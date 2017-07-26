@extends('layouts.base-layout-admin')

@include('includes.menu')

@section('inner--layout-admin')
<main class="container" id="clientes">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">@yield('title-section-admin')</h3>
		</div>
		<div class="panel-body">
			<div class="panel-body">
				@yield('content-admin')
			</div>
		</div>
	</div>
</main>   
@show