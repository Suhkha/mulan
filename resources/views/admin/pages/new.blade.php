@extends('layouts.inner--layout-admin')
@section('title-section-admin')Nueva página @stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ route('admin.pages.store') }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputTitle" class="col-lg-2 control-label">Título</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputTitle" name="title" placeholder="Título" value="{{ old('title') }}">
					@if ($errors->has('title'))
					    <span class="help-block">
					        <strong>{{ $errors->first('title') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputTitleEnglish" class="col-lg-2 control-label">Título en inglés</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputTitleEnglish" name="title_english" placeholder="Título en inglés" value="{{ old('title_english') }}">
					@if ($errors->has('title_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('title_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputSlug" class="col-lg-2 control-label">Slug</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputSlug" name="slug" placeholder="Slug" value="{{ old('slug') }}">
					@if ($errors->has('slug'))
					    <span class="help-block">
					        <strong>{{ $errors->first('slug') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputSlugEnglish" class="col-lg-2 control-label">Slug en inglés</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputSlugEnglish" name="slug_english" placeholder="Slug en inglés" value="{{ old('slug_english') }}">
					@if ($errors->has('slug_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('slug_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputContent" class="col-lg-2 control-label">Contenido</label>
				<div class="col-lg-8">
					<textarea class="form-control" id="inputContent" name="content" placeholder="Contenido">{{ old('content') }}</textarea>
					@if ($errors->has('content'))
					    <span class="help-block">
					        <strong>{{ $errors->first('content') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputContentEnglish" class="col-lg-2 control-label">Contenido en inglés</label>
				<div class="col-lg-8">
					<textarea class="form-control" id="inputContentEnglish" name="content_english" placeholder="Contenido en inglés">{{ old('content_english') }}</textarea>
					@if ($errors->has('content_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('content_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="inputPosition" class="col-lg-2 control-label">Posición</label>
				<div class="col-lg-3">
					<select name="position" class="form-control">
						<option value="">Seleccionar</option>
						<option value="0">Header</option>
						<option value="1">Footer</option>
					</select>
					@if ($errors->has('position'))
					    <span class="help-block">
					        <strong>{{ $errors->first('position') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection