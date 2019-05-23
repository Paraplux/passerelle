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
    <h1 class="article-main-title title-1">Lorem à la Une</h1>
    <div class="article-main-date">
        <p class="title-4">{{ $article->getDate('d') }}</p class="title-3">
        <p class="title-4">{{ $article->getDate('m') }}</p class="title-3">
        <hr>
        <p class="title-4">{{ $article->getDate('Y') }}</p class="title-4">
    </div>
</div>
    <div class="article-corp">
        
        <p class="article-main">
            <img id="first-picture" class="article-main-picture" src="{{ $article->thumb_1 }}" alt="">    
            <span id="content">{{ $article->content }}</span>
            <img id="second-picture" class="article-main-picture" src="{{ $article->thumb_2 }}" alt=""> 
        </p>
        <p class="article-signature">{{ $article->author }} - {{ $article->getDate('d/m/Y') }}</p>
    </div>
</div>

   
 
    <div class="article-side-content">
        @for($i = 0; $i < 3; $i++)
        <div class="article-annexe-{{ $i + 1 }}">
            <h1 class="title-4">{{ $lastArticles[$i]->title }}</h1>
            <p>{{ $lastArticles[$i]->getExtrait(30) }}</p>
            <p>{{ $lastArticles[$i]->getDate('d/m/Y') }}</p>
            <a href="/article/{{ $lastArticles[$i]->id }}" class="article-more">Voir Plus</a>
        </div>
        <hr>
    @endfor
    </div>
</div>
@endsection

@section('script')
<script src="/js/article.js"></script>
@endsection
