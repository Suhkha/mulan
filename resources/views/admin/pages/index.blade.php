@extends('layouts.inner--layout-admin')
@section('title-section-admin')Páginas @stop

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
					<th>Título</th>
					<th>Slug</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@if(count($pages) > 0)
				@foreach($pages as $page)
					<tr>
						<td>{{$page->id}}</td>
						<td>{{$page->title}}</td>
						<td>{{$page->slug}}</td>
						<td><a href="{{url('/admin/pages/edit/'.$page->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/pages/delete/'.$page->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar página" data-message="¿Desea eliminar esta página?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
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

		{{ $pages->links() }}
		
	</div>
	
@endsection