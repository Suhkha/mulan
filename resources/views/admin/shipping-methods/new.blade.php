@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo método de envío @stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ route('admin.shipping-methods.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de método de envío">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputStatus" class="col-lg-2 control-label">Estatus</label>
				<div class="col-lg-3">
					<select name="status" class="form-control">
						<option value="">Seleccionar</option>
						<option value="1">Activo</option>
						<option value="0">Desactivado</option>
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