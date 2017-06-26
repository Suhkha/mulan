@extends('layouts.inner--layout-admin')
@section('title-section-admin')Direcciones @stop

@section('content-admin')
	<a href="" class="right">Agregar nueva dirección</a>
	<div class="table-responsive">
		<table class="table table-responsive table-striped table-hover ">
			<thead>
				<tr>
					<th>#</th>
					<th>País</th>
					<th>Nombre</th>
					<th>Calle</th>
					<th>Colonia/Localidad</th>
					<th>Ciudad</th>
					<th>Estado/Provincia/Región</th>
					<th>C.P.</th>
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
					<td><a href="">Eliminar</a></td>
				</tr>
			@endforeach
			</tbody>
		</table> 
		{{ $addresses->links() }}
	</div>
	
@endsection