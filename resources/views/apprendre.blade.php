@extends('public-layout')

@section('title', 'Apprendre autrement avec le numérique')

@section('style')
<link rel="stylesheet" href="/css/apprendre.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/keyword-section.css">
<link rel="stylesheet" href="/css/dynamic-post.css">
<link rel="stylesheet" href="/css/calendar.css">
@endsection

@section('content')
<div class="apprendre-page">
    <div class="header">
        <p id="drawButtons">
            <i id="trash" class="fas fa-trash-alt"></i>
            <i id="undo" class="fas fa-undo"></i>
        </p>
        <div id="canvasDiv"></div>
        <img src="/images/image.png" alt="">
        <div class="title">
            <h1>{{ $keyword->name }} <i id="pencil" class="fas fa-pencil-alt"></i></h1>
            <p>{{ $keyword->survol }}</p>
        </div>
    </div>

    <div class="section">
        <div class="section-main">
            <div class="section-article">
                <img src="{{ $keyword->thumb }}" alt="">
                <div class="section-article-text">
                    <h1 class="title-2">{{ $keyword->name }}</h1>
                    <p>{{ $keyword->clique }}</p>
                </div>
            </div>
            <div class="dynamic-post-container" id="carousel-communication">
                @foreach($articles as $article)
                <div class="dynamic-post">
                    <div class="post-content">
                        <h3 class="title-4 text-italic">{{ $article->title }}</h3>
                        <p class="text-main">{!! $article->getExtrait() !!}</p>
                        <a href="/article/{{ $article->id }}" class="text-muted">Lire la suite...</a>
                    </div>
                    <div class="post-thumb">
                        <img src="{{ $article->thumb_1 }}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
        </div> <!-- /div.section-main -->
        
        <div class="section-side">
            <div class="calendar-widget">
                <div class="custom-calendar-wrap">
                    <div id="custom-inner" class="custom-inner">
                        <div class="custom-header clearfix">
                            <nav>
                                <span id="custom-prev" class="custom-prev"></span>
                                <span id="custom-next" class="custom-next"></span>
                            </nav>
                            <h2 id="custom-month" class="custom-month"></h2>
                            <h3 id="custom-year" class="custom-year"></h3>
                        </div>
                        <div id="calendar" class="fc-calendar-container"></div>
                    </div>
                </div>
            </div>
        </div> <!-- /div.section-side -->

    </div>

</div>
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/apprendre.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@endsection