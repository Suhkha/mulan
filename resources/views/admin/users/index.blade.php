@extends('layouts.inner--layout-admin')
@section('title-section-admin')Clientes @stop

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
					<th>Email</th>
					<th>Teléfono</th>
					<th>Facebook</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@if(count($users) > 0)
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@if($user->phone != null)
								{{ $user->phone }}
							@else
								No
							@endif
						</td>
						<td>
							@if($user->facebook_id != null)
								Sí
							@else
								No
							@endif
						</td>
						<td><a href="{{url('/admin/users/address/'.$user->id)}}">Direcciones</a></td>
						<td><a href="{{url('/admin/users/edit/'.$user->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/users/delete/'.$user->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar usuario" data-message="¿Desea eliminar a este usuario? Todos sus datos se verán afectados." data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
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

		{{ $users->links() }}
		
	</div>
	
@endsection