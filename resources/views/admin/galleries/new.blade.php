@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nueva imagen <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	<a href="{{url('/admin/products/show/'.$product->id)}}" class="right space-bottom">
		<i class="fa fa-pencil" aria-hidden="true"></i> Ver producto
	</a>
	<form class="form-horizontal dropzone" id="images-dropzone" method="post" action="{{ route('admin.galleries.store') }}">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->id }}">
		<div class="dz-message">
			<h3>Subir imagenes para la galería de <strong>{{ $product->name }}</strong></h3>
        </div>
	</form>

@endsection