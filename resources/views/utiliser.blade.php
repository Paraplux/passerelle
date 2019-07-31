@extends('public-layout')

@section('title', 'Utiliser')

@section('style')
<link rel="stylesheet" href="/css/utiliser.css">
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/keyword-section.css">
<link rel="stylesheet" href="/css/dynamic-post.css">
<link rel="stylesheet" href="/css/calendar.css">
<link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
@endsection

@section('content')

<div class="utiliser-page white">

        <div class="header">
            <div class="title">
                <h1 class="title-1">{{ $keyword->name }}</h1>
                <p class="text-title">{{ $keyword->survol }}</p>
                <img class="light" src="/images/icons/light-on.svg" alt=""/>
                <div class="phone-container">
                    <p class="click">Clique ici ></p>
                    <img id="b1" class="phone-on phone" src="/images/icons/smartphone-light-on.svg" alt=""/>
                </div>
            </div>
        </div> <!-- /div.header -->
    
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
    
        </div> <!--/div.section -->
    
    </div> <!-- /div.utiliser-page -->
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/utiliser.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@endsection



