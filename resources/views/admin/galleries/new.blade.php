@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nueva imagen @stop

@section('content-admin')
	
	<form class="form-horizontal dropzone" id="my-awesome-dropzone" method="post" action="{{ route('admin.galleries.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputProductId" class="col-lg-2 control-label">Producto</label>
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
				<div class="col-lg-3">
					<input type="file" name="file" />
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection