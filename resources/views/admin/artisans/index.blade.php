@extends('layouts.inner--layout-admin')
@section('title-section-admin')Artesanos @stop

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
					<th>Artesano del mes</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@if(count($artisans) > 0)
				@foreach($artisans as $artisan)
					<tr>
						<td>{{$artisan->id}}</td>
						<td>{{$artisan->name}}</td>
						<td>
							<form method="post" action="{{ url('/admin/artisans/status/') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $artisan->id }}">
								<input type="checkbox" name="artisan_of_month" onClick="this.form.submit()"  {{ $artisan->artisan_of_month ? 'checked' : '' }} />
							</form>
						</td>
						<td><a href="{{url('/admin/artisans/edit/'.$artisan->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/artisans/delete/'.$artisan->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar artesano" data-message="¿Desea eliminar este artesano?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
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

		{{ $artisans->links() }}
		
	</div>
	
@endsection