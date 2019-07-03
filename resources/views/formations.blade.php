@extends('public-layout')

@section('title', 'Se Former')

@section('style')
<link rel="stylesheet" href="/css/formations.css">
@endsection

@section('content')
<div class="formations-page">

    <div class="header">
        <img src="https://cdn.stocksnap.io/img-thumbs/960w/OO7XQL3Q9C.jpg" alt="" class="search-background">
        <div class="typewriter">Se former sur les différents métiers d'aujourd'hui et de demain.</div>
        <div class="input-field">
            <form action="/se-former/search" method="GET">
                <input name="query" type="text" placeholder="Formation, métiers, . . .">
            </form>
            <img src="/images/icons/search.png" alt="">
        </div>
    </div>
    @if(isset($search))
    <div class="formations-content">
        @if(count($search) === 0)
        <h2 id="searchResults" class="title-3">La recherche "<strong>{{ $query }}</strong>" n'a donné aucun résultat, affinez votre recherche ou jetez un oeil à notre contenu de formations ci dessous.</h2>
        @else 
        <h2 id="searchResults" class="title-3">Résultats pour : "{{ $query }}"</h2>
        @endif
        @foreach($search as $result)
        <p>{{ $result->name }} -> <a href="/formation/{{ $result->id }}">Voir la fiche</a></p>
        @endforeach
    </div>
    @endif
    <div class="section">
        <div class="section-main">
            <div class="section-article">
                <img src="/images/template/background-1.jpg" alt="">
                <div class="section-article-text">
                    <h1 class="title-2">Se former</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet? Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?</p>
                </div>
            </div>
            <div class="dynamic-post-container" id="carousel-communication">
                <div class="dynamic-post event">
                    <div class="post-content">
                        <h3 class="title-4 text-italic">Titre de l'événement</h3>
                        <p class="text-main">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa harum quam ullam corrupti, nobis abodit ipsa! Est corrupti voluptates consectetur, expedita eius facere saepe quam nostrum quos.</p>
                    </div>
                    <div class="post-thumb">
                        <img src="/images/landscape01.jpg" alt="">
                    </div>
                </div>
                <div class="dynamic-post news">
                    <div class="post-content">
                        <h3 class="title-4 text-italic">Titre de l'actualité</h3>
                        <p class="text-main">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa harum quam ullam corrupti, nobis aboditipsa! Est corrupti voluptates consectetur,expedita eius facesaepe quam nostrum quos repellat.</p>
                    </div>
                    <div class="post-thumb">
                        <img src="/images/landscape02.jpg" alt="">
                    </div>
                </div>
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