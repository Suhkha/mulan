@extends('layouts.inner--layout-admin')
@section('title-section-admin')Productos @stop

@section('content-admin')
	
	@if (session('success'))
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{ session('success') }}
		</div>
	@endif
	<div class="table-responsive">
		<table class="table table-responsive table-striped table-hover ">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Estatus</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@if(count($products) > 0)
				@foreach($products as $product)
					<tr>
						<td>{{$product->id}}</td>
						<td>{{$product->name}}</td>
						<td>
							<form method="post" action="{{ url('/admin/products/status/') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $product->id }}">
								<input type="checkbox" name="status" onClick="this.form.submit()"  {{ $product->status ? 'checked' : '' }} />
							</form>
						</td>
						<td><a href="{{url('/admin/products/show/'.$product->id)}}">Ver producto</a></td>
						<td><a href="{{url('/admin/galleries/new/'.$product->id)}}">Agregar imágenes</a></td>
						<td><a href="{{url('/admin/videos/new/'.$product->id)}}">Agregar video</a></td>
						<td><a href="{{url('/admin/products/edit/'.$product->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/products/delete/'.$product->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar producto" data-message="¿Desea eliminar esta producto? Si borra el producto se borrarán la galería relacionada a ella." data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
							</form>
							@include('includes.admin-modal-confirm-delete')
						</td>
					</tr>
				@endforeach
			@else
				No hay resultados
			@endif
			</tbody>
		</table> 

		{{ $products->links() }}
		
	</div>
	
@endsection