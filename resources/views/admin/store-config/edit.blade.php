@extends('layouts.inner--layout-admin')
@section('title-section-admin')Editar datos de la tienda <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	@if (session('success'))
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  {{ session('success') }}
		</div>
	@endif
	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('admin/store-config/update/'.$store->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de la tienda" value="{{$store->name}}">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputPhoto" class="col-lg-2 control-label">Logo</label>
				<div class="col-lg-3">
					<img src="{{ Storage::url($store->path) }}" class="img-responsive img-thumbnail" width="150">
					<p>
						<small>{{$store->path}}</small>
					</p>
					<div>
					  <label for="path" class="btn btn-primary">
					  Seleccionar nueva foto</label>
					  <input id="path" type="file" style="visibility:hidden;" name="path">
					</div>
					@if ($errors->has('path'))
					    <span class="help-block">
					        <strong>{{ $errors->first('path') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputFb" class="col-lg-2 control-label">Facebook</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputFb" name="facebook" value="{{ $store->facebook }}">
					@if ($errors->has('facebook'))
					    <span class="help-block">
					        <strong>{{ $errors->first('facebook') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputTw" class="col-lg-2 control-label">Twitter</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputTw" name="twitter" value="{{ $store->twitter }}">
					@if ($errors->has('twitter'))
					    <span class="help-block">
					        <strong>{{ $errors->first('twitter') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputIn" class="col-lg-2 control-label">Instagram</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputIn" name="instagram" value="{{ $store->instagram }}">
					@if ($errors->has('instagram'))
					    <span class="help-block">
					        <strong>{{ $errors->first('instagram') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputContactEmail" class="col-lg-2 control-label">Contacto</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputContactEmail" name="contact_email" value="{{ $store->contact_email }}">
					@if ($errors->has('contact_email'))
					    <span class="help-block">
					        <strong>{{ $errors->first('contact_email') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputPhone" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPhone" name="phone" value="{{ $store->phone }}">
					@if ($errors->has('phone'))
					    <span class="help-block">
					        <strong>{{ $errors->first('phone') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection