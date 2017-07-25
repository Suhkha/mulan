@extends('layouts.inner--layout-admin')
@section('title-section-admin')Editar artesano <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')

	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('admin/artisans/update/'.$artisan->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputName" class="col-lg-2 control-label">Nombre</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre de artesano" value="{{$artisan->name}}">
					@if ($errors->has('name'))
					    <span class="help-block">
					        <strong>{{ $errors->first('name') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputPhoto" class="col-lg-2 control-label">Foto</label>
				<div class="col-lg-3">
					<img src="{{ Storage::url($artisan->photo) }}" class="img-responsive img-thumbnail" width="150">
					<p>
						<small>{{$artisan->photo}}</small>
					</p>
					<div>
					  <label for="photo" class="btn btn-primary">
					  Seleccionar nueva foto</label>
					  <input id="photo" type="file" style="visibility:hidden;" name="photo">
					</div>
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
					<textarea class="form-control" id="inputBio" name="bio" placeholder="Bio">
						{{$artisan->bio}}
					</textarea>
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
					<textarea class="form-control" id="inputBioEnglish" name="bio_english" placeholder="Bio en inglés">
						{{$artisan->bio_english}}
					</textarea>
					@if ($errors->has('bio_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('bio_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection