@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo cliente @stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ route('admin.users.submit') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre completo">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputEmail" class="col-lg-2 control-label">Email</label>
				<div class="col-lg-3">
					<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
					@if ($errors->has('email'))
					    <span class="help-block">
					        <strong>{{ $errors->first('email') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputPhone" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Teléfono">
					@if ($errors->has('phone'))
					    <span class="help-block">
					        <strong>{{ $errors->first('phone') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputPassword" class="col-lg-2 control-label">Password</label>
				<div class="col-lg-3">
					<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
					@if ($errors->has('password'))
					    <span class="help-block">
					        <strong>{{ $errors->first('password') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection