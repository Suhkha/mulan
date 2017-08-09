@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo producto @stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ route('admin.products.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de producto" value="{{ old('name') }}">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputStatus" class="col-lg-2 control-label">Artesano</label>
				<div class="col-lg-3">
					<select name="artisan_id" class="form-control">
						<option value="">Seleccionar</option>
						@foreach($artisans as $artisan)
							<option value="{{ $artisan->id }}">{{ $artisan->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('artisan_id'))
					    <span class="help-block">
					        <strong>{{ $errors->first('artisan_id') }}</strong>
					    </span>
					@endif
				</div>

				<label for="inputStatus" class="col-lg-2 control-label">Categoría</label>
				<div class="col-lg-3">
					<select name="category_id" class="form-control">
						<option value="">Seleccionar</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('category_id'))
					    <span class="help-block">
					        <strong>{{ $errors->first('category_id') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputDescription" class="col-lg-2 control-label">Descripción</label>
				<div class="col-lg-8">
					<textarea name="description" id="inputDescription" class="form-control" cols="30" rows="10" placeholder="Descripción en español">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
					    <span class="help-block">
					        <strong>{{ $errors->first('description') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputDescriptionEnglish" class="col-lg-2 control-label">Descripción en inglés</label>
				<div class="col-lg-8">
					<textarea name="description_english" id="inputDescriptionEnglish" class="form-control" cols="30" rows="10" placeholder="Descripción en inglés">{{ old('description_english') }}</textarea>
					@if ($errors->has('description_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('description_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<label for="inputPriceMXN" class="col-lg-2 control-label">Precio MXN</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPriceMXN" name="price_mxn" placeholder="Precio en pesos mexicanos" value="{{ old('price_mxn') }}">
					@if ($errors->has('price_mxn'))
					    <span class="help-block">
					        <strong>{{ $errors->first('price_mxn') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputPriceUSD" class="col-lg-2 control-label">Precio USD</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputPriceUSD" name="price_usd" placeholder="Precio en dólares" value="{{ old('price_usd') }}">
					@if ($errors->has('price_usd'))
					    <span class="help-block">
					        <strong>{{ $errors->first('price_usd') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputStock" class="col-lg-2 control-label">Stock</label>
				<div class="col-lg-3">
					<input type="number" class="form-control" id="inputStock" name="stock" placeholder="Stock" value="{{ old('stock') }}">
					@if ($errors->has('stock'))
					    <span class="help-block">
					        <strong>{{ $errors->first('stock') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputStatus" class="col-lg-2 control-label">Status</label>
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