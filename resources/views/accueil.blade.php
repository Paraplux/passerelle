@extends('public-layout')

@section('title', 'Accueil')

@section('style')
<link rel="stylesheet" href="/css/accueil.css">
<link rel="stylesheet" href="/css/keyword-section.css">
<link rel="stylesheet" href="/css/dynamic-post.css">
<link rel="stylesheet" href="/css/calendar.css">
<link rel="stylesheet" href="/css/carousel.css">
@endsection

@section('content')
<div class="home-wrap">
    <header class="header" style="background-image: url('{{ $content->accueil_thumb }}')">
        <div class="home-keywords">
            <a href="{{ route('sensibiliser') }}"><div><i class="keyword-button fa fa-bullhorn"></i><div class="keyword-label">Sensibiliser</div></div></a>
            <a href="{{ route('se-former') }}"><div><i class="keyword-button fa fa-graduation-cap"></i><div class="keyword-label">Se former</div></div></a>
            <a href="{{ route('accompagner') }}"><div><i class="keyword-button far fa-handshake"></i><div class="keyword-label">Accompagner</div></div></a>
            <a href="{{ route('innover') }}"><div><i class="keyword-button far fa-lightbulb"></i><div class="keyword-label">Innover</div></div></a>
            <a href="{{ route('apprendre') }}"><div><i class="keyword-button fas fa-brain"></i><div class="keyword-label">Apprendre</div></div></a>
            <a href="{{ route('utiliser') }}"><div><i class="keyword-button far fa-hand-pointer"></i><div class="keyword-label">Utiliser</div></div></a>
            <a href="{{ route('partager') }}"><div><i class="keyword-button fas fa-hands"></i><div class="keyword-label">Partager</div></div></a>
        </div>
        <div class="header-buttons">
            <a href="{{ route('partenaire') }}" class="header-button">Qui sommes nous ?</a>
            <a href="{{ route('engagements') }}" class="header-button">Notre charte d'engagements</a>
        </div>
        <div class="feature">
            <div class="feature-header">
                <i id="feature-left" class="fas fa-chevron-left"></i>
                <i class="far fa-newspaper"></i>
                <i id="feature-right" class="fas fa-chevron-right"></i>
            </div>
            <div class="feature-body">
                <div class="feature-carousel" id="carousel-feature">
                    <iframe src="https://www.youtube.com/embed/6ALDzbxuk3g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe src="https://www.youtube.com/embed/hdQebrdkpm0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="feature-footer"></div>
        </div>
    </header>
    <div class="container">
        <div class="main-content">
            <div class="communication">
                <div class="communication-header">
                    <i class="far fa-comments"></i>
                    <h2 class="title-2">{{ $content->accueil_news_subtitle }}</h2>
                </div>
                <div class="dynamic-post-container" id="carousel-communication">
                    @for($i = 0; $i < 2; $i++)
                    <div class="dynamic-post">
                        <div class="post-content">
                            <h3 class="title-4 text-italic">{{ $articles[$i]->title }}</h3>
                            <p class="text-main">{!! $articles[$i]->getExtrait() !!}</p>
                            <a href="/article/{{ $articles[$i]->id }}" class="text-muted">Lire la suite...</a>
                        </div>
                        <div class="post-thumb">
                            <img src="{{ $articles[$i]->thumb_1 }}" alt="">
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="formations">
                <div class="formations-header">
                    <i class="fas fa-fire-alt"></i>
                    <h2 class="title-2">{{ $content->accueil_formations_subtitle }}</h2>
                </div>
                <div class="formations-body" id="carousel-formations">
                    @for($i = 0; $i < 3; $i++)
                    @foreach($formations as $formation)
                    <div class="formations-tile">
                        <div class="tile-head">
                            <h1 class="title-4">{{ $formation->name }}</h1>
                        </div>
                        <div class="tile-body">
                            <div class="tile-info">
                                <i class="far fa-clock"></i> {{ $formation->duree }} H
                            </div>
                            <div class="tile-info">
                                <i title="Sous réserver des places disponibles et blablablabla" class="fas fa-exclamation-circle"></i> Lorem Ipsum
                            </div>
                            <div class="tile-info">
                                <i class="fas fa-map-marker-alt"></i> {{ $formation->structure->commune->nom_commune }}
                            </div>
                            <div class="tile-info">
                                <i class="fas fa-plus"></i><a href="/formation/{{ $formation->id }}">Voir la fiche...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endfor
                </div>
            </div>
        </div>
        <div class="side-content">
            <div class="weather">
                <div class="weather-icon">
                    <?= $weatherStatus ?>
                </div>
                <div class="weather-temp"><strong><?= $currentWeather['temp'] ?>°C</strong></div>
                <div class="weather-text"><?= $currentWeather['description'] ?></div>
                <div class="weather-city"><?= $currentWeather['city'] ?><i class="fas fa-map-marker-alt"></i></div>
            </div>
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/accueil.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@endsection
