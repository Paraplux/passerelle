@extends('public-layout')

@section('title')
{{ $article->title }}
@endsection

@section('style')
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
    <link rel="stylesheet" href="/css/article.two.css">
@endsection

@section('content') 
<div class="article-page">
    <div class="article-main-content">
    <div class="article-head">
    <h1 class="article-main-title title-3">{{ $article->title }}</h1>
    <p class="article-main-date text-muted">{{ $article->getDate('d') }}/{{ $article->getDate('m') }}/{{ $article->getDate('Y') }}</p>
</div>
    <div class="article-corp">
        <p class="article-main">
            <img id="first-picture" class="article-main-picture" src="{{ $article->thumb_1 }}" alt="">    
            <span id="content">{{  $article->content }}</span>
            <img id="second-picture" class="article-main-picture" src="{{ $article->thumb_2 }}" alt=""> 
        </p>
        <p class="article-signature">{{ $article->author }} - {{ $article->getDate('d/m/Y') }}</p>
    </div>
</div>

   
 
<div class="article-side-content">
        @for($i = 0; $i < 3; $i++)
            <div class="article-annexe-{{ $i + 1 }}">
                <h2 class="title-4">{{ $lastArticles[$i]->title }}</h2>
                <p class="text-muted">{!! $lastArticles[$i]->getExtrait(100) !!}</p>
                <a href="/article/{{ $lastArticles[$i]->id }}" class="article-more">Voir Plus</a>
                <p>{{ $lastArticles[$i]->getDate('d/m/Y') }}</p>
            </div>
            <hr>
        @endfor
        </div>
</div>
@endsection

@section('script')
<script src="/js/article.js"></script>
@endsection
