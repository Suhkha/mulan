@extends('layouts.inner--layout-admin')
@section('title-section-admin')Métodos de envío @stop

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
				</tr>
			</thead>
			<tbody>
			@if(count($shippings) > 0)
				@foreach($shippings as $shipping)
					<tr>
						<td>{{$shipping->id}}</td>
						<td>{{$shipping->name}}</td>
						<td>
							<form method="post" action="{{ url('/admin/shipping-methods/status/') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $shipping->id }}">
								<input type="checkbox" name="status" onClick="this.form.submit()"  {{ $shipping->status ? 'checked' : '' }} />
							</form>
						</td>
						<td><a href="{{url('/admin/shipping-methods/edit/'.$shipping->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/shipping-methods/delete/'.$shipping->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar método de envío" data-message="¿Desea eliminar este método de envío?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
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

		{{ $shippings->links() }}
		
	</div>
	
@endsection