@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nuevo artesano @stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('admin.artisans.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de artesano" value="{{ old('name') }}">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputPhoto" class="col-lg-2 control-label">Foto</label>
				<div class="col-lg-3">
					<input type="file" name="photo" placeholder="Foto del artesano">
					@if ($errors->has('photo'))
					    <span class="help-block">
					        <strong>{{ $errors->first('photo') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputBio" class="col-lg-2 control-label">Bio</label>
				<div class="col-lg-9">
					<textarea class="form-control" id="inputBio" name="bio" placeholder="Bio">{{ old('bio') }}</textarea>
					@if ($errors->has('bio'))
					    <span class="help-block">
					        <strong>{{ $errors->first('bio') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputBioEnglish" class="col-lg-2 control-label">Bio en inglés</label>
				<div class="col-lg-9">
					<textarea class="form-control" id="inputBioEnglish" name="bio_english" placeholder="Bio en inglés">{{ old('bio_english') }}</textarea>
					@if ($errors->has('bio_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('bio_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputArtisanOfMonth" class="col-lg-2 control-label">Artesano del mes</label>
				<div class="col-lg-3">
					<select name="artisan_of_month" class="form-control">
						<option value="">Seleccionar</option>
						<option value="1">Sí</option>
						<option value="0">No</option>
					</select>
					@if ($errors->has('artisan_of_month'))
					    <span class="help-block">
					        <strong>{{ $errors->first('artisan_of_month') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection