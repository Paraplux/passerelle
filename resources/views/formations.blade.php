@extends('public-layout')

@section('title', 'Se Former')

@section('style')
<link rel="stylesheet" href="/css/formations.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/keyword-section.css">
<link rel="stylesheet" href="/css/dynamic-post.css">
<link rel="stylesheet" href="/css/calendar.css">
@endsection

@section('content')
<div class="formations-page">

    <div class="header">
        <img src="{{ $content->formations_thumb }}" alt="" class="search-background">
        <div class="typewriter">Se former sur les différents métiers d'aujourd'hui et de demain.</div>
        <div class="input-field">
            <form action="/se-former/search" method="GET">
                <input name="query" type="text" placeholder="Formation, métiers, . . .">
            </form>
            <img src="/images/icons/search.png" alt="">
        </div>
    </div>
    <div class="section">
        <div class="section-main">
                @if(isset($fiches))
                <div class="formations-content scroll-anchor">
                    @if(count($fiches) === 0)
                    <h2 id="searchResults" class="title-3">La recherche "<strong>{{ $query }}</strong>" n'a donné aucun résultat, affinez votre recherche ou jetez un oeil à notre contenu de formations ci dessous.</h2>
                    @else 
                    <h2 id="searchResults" class="title-3">Résultats pour : "{{ $query }}"</h2>
                    @endif
                    @foreach($fiches as $fiche)
                    <p><a class="results" href="/formation/{{ $fiche->id }}">{{ $fiche->name }}</a></p>
                    {!! $fiche->content !!}
                    @endforeach
                </div>
                @endif
            <div class="section-article">
                <img src="/images/template/background-1.jpg" alt="">
                <div class="section-article-text">
                    <h1 class="title-2">Se former</h1>
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

    </div>

</div>

@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/typewriter.js"></script>
<script src="/js/formations.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@if(isset($search))
<script>
    const thisTop = window.pageYOffset
    const thisLeft = window.pageXOffset
    jump('.scroll-anchor', thisTop, thisLeft)
</script>
@endif
@endsection