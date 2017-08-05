@extends('layouts.inner--layout-admin')
@section('title-section-admin')Editar método de pago <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ url('admin/payment-methods/update/'.$payment->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" value="{{$payment->name}}" placeholder="Nombre">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputNameEnglish" class="col-lg-2 control-label">Nombre en inglés</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputNameEnglish" name="name_english" value="{{$payment->name_english}}" placeholder="Nombre">
					@if ($errors->has('name_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection