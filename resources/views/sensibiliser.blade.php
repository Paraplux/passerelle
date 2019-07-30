@extends('public-layout')

@section('title', 'Sensibiliser')

@section('style')
<link rel="stylesheet" href="/css/sensibiliser.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/keyword-section.css">
<link rel="stylesheet" href="/css/dynamic-post.css">
<link rel="stylesheet" href="/css/calendar.css">
<link rel="stylesheet" href="/css/partenaires-slider.css">
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<div class="sensibiliser-page">

    <div class="header">
        <div class="megaphone-container">
            <img class="megaphone" src="/images/sensibiliser-2.png" alt="">
            <div class="megaphone-sound top"></div>
            <div class="megaphone-sound center"></div>
            <div class="megaphone-sound bottom"></div>
        </div>
        <div class="title">
            <h1>Sensibiliser</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?</p>
        </div>
    </div> <!-- /div.header -->

    <div class="section">
        <div class="section-main">
            <div class="section-article">
                <img src="/images/template/background-1.jpg" alt="">
                <div class="section-article-text">
                    <h1 class="title-2">Sensibiliser</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?</p>
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

</div> <!-- /div.accompagner-page -->

@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/sensibiliser.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@endsection