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
        <p>{{ $formation->name }} -> <a href="/formation/{{ $formation->id }}">Voir la fiche</a></p>
        @endforeach
    @endif

    @if(isset($articles) && count($articles) != 0)
    <h2 class="title-4">Section articles :</h2>
        @foreach($articles as $article)
        <p>{{ $article->title }} -> <a href="/article/{{ $article->id }}">Voir l'article</a></p>
        @endforeach
    @endif
</div>
@endsection

@section('script')

@endsection