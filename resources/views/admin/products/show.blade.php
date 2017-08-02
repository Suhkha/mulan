@extends('layouts.inner--layout-admin')
@section('title-section-admin')Detalle producto <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	
	@if (session('success'))
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{ session('success') }}
		</div>
	@endif
	<a href="{{url('/admin/products/edit/'.$product->id)}}" class="right">
		<i class="fa fa-pencil" aria-hidden="true"></i> Editar producto
	</a>
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

	<div id="#gallery" class="space-top">
		@if(count($product->gallery) > 0)
			<h4 class="subtitle-section">Galería de imágenes</h4>
			@foreach ($product->gallery as $path)
				<div class="col-md-3 product__gallery">
					<img src="{{ Storage::url($path->photo) }}"  class="img-responsive img-thumbnail product__gallery--img clearfix" alt="">
					<form method="post" action="{{ url('/admin/galleries/delete/'.$path->id) }}">
						{{ csrf_field() }}
						<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar imagen" data-message="¿Desea eliminar esta imagen?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
					</form>
					@include('includes.admin-modal-confirm-delete')
				</div>
			@endforeach
		@else
			<label for="">Aún no hay galería de imágenes. Agregar <a href="{{url('/admin/galleries/new/'.$product->id)}}">aquí</a>.</label>
		@endif
	</div>
	
@endsection