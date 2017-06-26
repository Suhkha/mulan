@extends('layouts.inner--layout-admin')
@section('title-section-admin')Usuarios @stop

@section('content-admin')
	
	<div class="table-responsive">
		<table class="table table-responsive table-striped table-hover ">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Facebook</th>
					<th>Direcciones</th>
					<th>Editar</th>
					<th>Activo</th>
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
						<td><a href="">Editar</a></td>
						<td><input type="checkbox"></td>
					</tr>
				@endforeach
			@else
				No hay resultadoss
			@endif
			</tbody>
		</table> 

		{{ $users->links() }}
		
	</div>
	
@endsection