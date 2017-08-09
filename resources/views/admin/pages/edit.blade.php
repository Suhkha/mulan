@extends('layouts.inner--layout-admin')
@section('title-section-admin')Editar página <a href="javascript:history.back()" class="right"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Regresar</a>@stop

@section('content-admin')
	
	<form class="form-horizontal" method="post" action="{{ url('admin/pages/update/'.$page->id) }}">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label for="inputTitle" class="col-lg-2 control-label">Título</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputTitle" name="title" value="{{$page->title}}" placeholder="Título">
					@if ($errors->has('title'))
					    <span class="help-block">
					        <strong>{{ $errors->first('title') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputTitleEnglish" class="col-lg-2 control-label">Título en inglés</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputTitleEnglish" name="title_english" value="{{$page->title_english}}" placeholder="Título en inglés">
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
					<input type="text" class="form-control" id="inputSlug" name="slug" value="{{$page->slug}}" placeholder="Slug">
					@if ($errors->has('slug'))
					    <span class="help-block">
					        <strong>{{ $errors->first('slug') }}</strong>
					    </span>
					@endif
				</div>
				<label for="inputSlugEnglish" class="col-lg-2 control-label">Slug en inglés</label>
				<div class="col-lg-3">
					<input type="text" class="form-control" id="inputSlugEnglish" name="slug_english" value="{{$page->slug_english}}" placeholder="Slug en inglés">
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
					<textarea class="form-control" id="inputContent" name="content" id="" cols="30" rows="10">
						{{$page->content}}
					</textarea>
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
					<textarea class="form-control" id="inputContentEnglish" name="content_english" id="" cols="30" rows="10">
						{{$page->content_english}}
					</textarea>
					@if ($errors->has('content_english'))
					    <span class="help-block">
					        <strong>{{ $errors->first('content_english') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<button type="submit" class="btn btn-default col-lg-offset-11">Guardar</button>
		</fieldset>
	</form>
	
@endsection