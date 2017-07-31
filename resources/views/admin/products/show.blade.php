@extends('layouts.inner--layout-admin')
@section('title-section-admin')Ver producto <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	
	@if (session('success'))
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{ session('success') }}
		</div>
	@endif

	<div class="row">
		<div class="col-md-6">
			<label for="">Producto: </label><br> {{ $product->name }}
		</div>
		<div class="col-md-6">
			<label for="">Stock: </label><br> {{ $product->stock }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Artesano: </label><br> {{ $product->artisan->name }}
		</div>
		<div class="col-md-6">
			<label for="">Categoría: </label><br> {{ $product->category->name }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Precio MXN: </label><br> {{ $product->price_mxn }}
		</div>
		<div class="col-md-6">
			<label for="">Precio USD: </label><br> {{ $product->price_usd }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Descripción: </label><br> {{ $product->description }}
		</div>
		<div class="col-md-6">
			<label for="">Descripción en inglés: </label><br> {{ $product->description_english }}
		</div>
	</div>
	
	<a href="{{url('/admin/products/edit/'.$product->id)}}" class="right">
		<i class="fa fa-pencil" aria-hidden="true"></i> Editar producto
	</a>
@endsection