@extends('layouts.inner--layout-admin')
@section('title-section-admin')Videos @stop

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
					<th>Video</th>
					<th>Producto relacionado</th>
					<th>Estatus</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@if(count($videos) > 0)
				@foreach($videos as $video)
					<tr>
						<td>{{$video->id}}</td>
						<td>{{$video->name}}</td>
						<td>
							<iframe width="250" height="200" src="https://www.youtube.com/embed/{{$video->url}}" frameborder="0" allowfullscreen></iframe>
						</td>
						<td>{{ $video->product->name }}</td>
						<td class="check">
							<form method="post" action="{{ url('/admin/videos/status/') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $video->id }}">
								<input type="checkbox" name="status" onClick="this.form.submit()"  {{ $video->status ? 'checked' : '' }} />
							</form>
						</td>
						<td><a href="{{url('/admin/videos/edit/'.$video->id)}}">Editar</a></td>
						<td>
							<form method="post" action="{{ url('/admin/videos/delete/'.$video->id) }}">
								{{ csrf_field() }}
								<a href="" class="delete-link" data-toggle="modal", data-target="#delete__confirm"  data-title="Eliminar video" data-message="¿Desea eliminar este video?" data-btncancel="btn-default" data-btnaction="btn-danger" data-btntxt="Disable">Eliminar</a>
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

		{{ $videos->links() }}
		
	</div>
	
@endsection