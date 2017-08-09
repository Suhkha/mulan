@extends('layouts.inner--layout-admin')
@section('title-section-admin')Editar artesano <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	<form class="form-horizontal" method="post" action="{{ url('admin/videos/update/'.$video->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre de video</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" value="{{$video->name}}" placeholder="Nombre de video">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputURL" class="col-lg-2 control-label">ID Video Youtube</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputURL" name="url" value="{{$video->url}}"placeholder="ID de video">
					@if ($errors->has('url'))
					    <span class="help-block">
					        <strong>{{ $errors->first('url') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputProduct" class="col-lg-2 control-label">Producto relacionado</label>
				<div class="col-lg-3">
					<select name="product_id" class="form-control">
						<option value="{{$video->product->id}}">{{$video->product->name}}</option>
						@foreach($products as $product)
							<option value="{{ $product->id }}">{{ $product->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('product_id'))
					    <span class="help-block">
					        <strong>{{ $errors->first('product_id') }}</strong>
					    </span>
					@endif
				</div>
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>

@endsection