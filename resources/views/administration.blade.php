@extends('private-layout')

@section('style')
<link rel="stylesheet" href="/css/administration.css">
<link rel="stylesheet" href="/css/flexdatalist.css">
@endsection

@section('content')

<p class="text-muted">
<?php $url = explode('/', Request::path())?>
@if(count($url) === 1)
    <strong class="text-dark">Administration </strong>
@elseif(count($url) === 2)
    > <a class="text-muted" href="{{ route('governator') }}">Administration</a> >
    > <strong class="text-dark">{{ ucfirst($url[1]) }}</strong> > 
@else
    <a class="text-muted" href="{{ route('governator') }}">Administration</a> >
    <a class="text-muted" href="/governator/communication">{{ ucfirst($url[1]) }}</a> > 
    <strong class="text-dark">{{ ucfirst($url[2]) }}</strong>
@endif
</p>

@yield('index')

@yield('create')


@yield('edit')

@endsection

@section('script')
<script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
<script>CKEDITOR.replace( 'article_ckeditor' );</script>
<script>CKEDITOR.replace( 'fiche_ckeditor_1' );</script>
<script>CKEDITOR.replace( 'fiche_ckeditor_2' );</script>
<script>CKEDITOR.replace( 'fiche_ckeditor_3' );</script>
<script>CKEDITOR.replace( 'fiche_ckeditor_4' );</script>
<script>CKEDITOR.replace( 'faq_ckeditor' );</script>

<script src='/js/tags.js'></script>
<script src="/js/flexdatalist.js"></script>
@endsection