@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nueva dirección <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ url('admin/users/address-update/'.$address->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->name}}" id="inputName" name="name" placeholder="Ejemp.: Dirección de mi casa...">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputPhone" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPhone" value="{{$address->phone}}" name="phone" placeholder="Teléfono">
					@if ($errors->has('phone'))
					    <span class="help-block">
					        <strong>{{ $errors->first('phone') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputAddress" class="col-lg-2 control-label">Calle y número</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->address_1}}"  id="inputAddress" name="address_1" placeholder="Calle y número">
					@if ($errors->has('address_1'))
					    <span class="help-block">
					        <strong>{{ $errors->first('address_1') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputAddress2" class="col-lg-2 control-label">Colonia/Localidad</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->address_2}}"  id="inputAddress2" name="address_2" placeholder="Colonia/Localidad">
					@if ($errors->has('address_2'))
					    <span class="help-block">
					        <strong>{{ $errors->first('address_2') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">

				<label for="inputZip" class="col-lg-2 control-label">Código Postal</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->zip}}"  id="inputZip" name="zip" placeholder="Código Postal">
					@if ($errors->has('zip'))
					    <span class="help-block">
					        <strong>{{ $errors->first('zip') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputCity" class="col-lg-2 control-label">Ciudad/Delegación</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->city}}"  id="inputCity" name="city" placeholder="Ciudad/Delegación">
					@if ($errors->has('city'))
					    <span class="help-block">
					        <strong>{{ $errors->first('city') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputState" class="col-lg-2 control-label">Estado/Provincia/Región</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->state}}"  id="inputState" name="state" placeholder="Estado/Provincia/Región">
					@if ($errors->has('state'))
					    <span class="help-block">
					        <strong>{{ $errors->first('state') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputCountry" class="col-lg-2 control-label">País</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" value="{{$address->country}}"  id="inputCountry" name="country" placeholder="País">
					@if ($errors->has('country'))
					    <span class="help-block">
					        <strong>{{ $errors->first('country') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection