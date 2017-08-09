@extends('layouts.base-layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page->title }}</div>

                <div class="panel-body">
                    @if( \App::getLocale() == 'en' )
                        {!! $page->content_english !!}
                    @else
                        {!! $page->content !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection