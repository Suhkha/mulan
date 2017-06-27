@extends('layouts.inner--layout-admin')
@section('title-section-admin')Direcciones <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a> @stop

@section('content-admin')
<a href="{{url('/admin/users/new-address/'.$id)}}" class="space-bottom link">Agregar nueva dirección</a>

<div class="table-responsive">
	<table class="table table-responsive table-striped table-hover ">
		<thead>
			<tr>
				<th>#</th>
				<th>ID Usuario</th>
				<th>País</th>
				<th>Nombre</th>
				<th>Calle</th>
				<th>Colonia/Localidad</th>
				<th>Ciudad</th>
				<th>Estado/Provincia/Región</th>
				<th>C.P.</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($addresses as $address)
			<tr>
				<td>{{ $address->id }}</td>
				<td>{{ $address->country }}</td>
				<td>{{ $address->name }}</td>
				<td>{{ $address->address_1 }}</td>
				<td>{{ $address->address_2 }}</td>
				<td>{{ $address->city }}</td>
				<td>{{ $address->state }}</td>
				<td>{{ $address->zip }}<td>
				<td><a href="{{url('/admin/users/address-edit/'.$address->id)}}">Editar</a></td>
				<td>
					<form method="post" action="{{ url('/admin/users/address-delete/'.$address->id) }}">
						{{ csrf_field() }}
						<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar dirección" data-message="¿Desea eliminar esta dirección?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
					</form>
					@include('includes.admin-modal-confirm-delete')
				</td>
			</tr>
				@endforeach
			</tbody>
		</table> 
		{{ $addresses->links() }}
	</div>
	
	@endsection