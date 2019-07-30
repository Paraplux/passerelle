@extends('public-layout')

@section('title')
Résultats pour : {{ $query }}
@endsection

@section('style')
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<div class="results-page">
    <h1 class="title-1">Notre contenu contenant : {{ $query }}</h1>

    @if(isset($formations) && count($formations) != 0)
    <h2 class="title-4">Section formations :</h2>
        @foreach($formations as $formation)
        <p><a href="/formation/{{ $formation->id }}">{{ $formation->name }}</a></p>
        {!! substr($formation->content,0,300) !!}
        @endforeach
    @endif

    @if(isset($articles) && count($articles) != 0)
    <h2 class="title-4">Section articles :</h2>
        @foreach($articles as $article)
        <p class="resultTitle"><a href="/article/{{ $article->id }}">{{ $article->title }}</a></p>
        <div class="resultExtrait text-muted">{!! substr($article->content,0,300) !!}</div>
        @endforeach
    @endif
</div>
@endsection

@section('script')

@endsection