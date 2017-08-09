@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo video @stop

@section('content-admin')
	<form class="form-horizontal" method="post" action="{{ route('admin.videos.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre de video</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de video" value="{{ old('name') }}">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputURL" class="col-lg-2 control-label">ID Video Youtube</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputURL" name="url" placeholder="ID de video" value="{{ old('url') }}">
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
						<option value="">Seleccionar</option>
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

				<label for="inputStatus" class="col-lg-2 control-label">Estatus</label>
				<div class="col-lg-3">
					<select name="status" class="form-control">
						<option value="">Seleccionar</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
					@if ($errors->has('status'))
					    <span class="help-block">
					        <strong>{{ $errors->first('status') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>

@endsection