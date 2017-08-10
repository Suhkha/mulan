@extends('layouts.inner--layout-admin')
@section('title-section-admin')Categorías @stop

@section('content-admin')
	
	@if (session('success'))
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{ session('success') }}
		</div>
	@endif
	@if (session('error'))
		<div class="alert alert-dismissible alert-danger">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>{{ session('error') }}</strong>
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
			@if(count($categories) > 0)
				@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td class="check">
							<form method="post" action="{{ url('/admin/categories/status/') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $category->id }}">
								<input type="checkbox" name="status" onClick="this.form.submit()"  {{ $category->status ? 'checked' : '' }} />
							</form>
						</td>
						<td><a href="{{url('/admin/categories/edit/'.$category->id)}}">Editar</a></td>
						<td>
						@if($category->status == 1)
							<span>Desactive la categoría para poder eliminarla</span>
						@else
							<form method="post" action="{{ url('/admin/categories/delete/'.$category->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar categoría" data-message="¿Desea eliminar esta categoría? Si borra la categoría se borrarán los productos relacionados a ella." data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
							</form>
							@include('includes.admin-modal-confirm-delete')
						@endif
						</td>
					</tr>
				@endforeach
			@else
				No hay resultados
			@endif
			</tbody>
		</table> 

		{{ $categories->links() }}
		
	</div>
	
@endsection