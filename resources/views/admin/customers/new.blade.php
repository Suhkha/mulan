@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo cliente@stop

@section('content-admin')
	
	<form class="form-horizontal">
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre completo">
				</div>

				<label for="inputEmail" class="col-lg-2 control-label">Email</label>
				<div class="col-lg-3">
					<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPhone" class="col-lg-2 control-label">Teléfono</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPhone" name="email" placeholder="Teléfono">
				</div>

				<label for="inputPassword" class="col-lg-2 control-label">Password</label>
				<div class="col-lg-3">
					<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				
			</div>
			<a href="#" class="btn btn-default col-lg-offset-11">Guardar</a>
		</fieldset>
	</form>
	
@endsection