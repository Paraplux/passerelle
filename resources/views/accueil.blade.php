@extends('public-layout')

@section('title', 'Accueil')

@section('style')
<link rel="stylesheet" href="/css/accueil.css">
<link rel="stylesheet" href="/css/carousel.css">
@endsection

@section('content')
<div class="home-wrap">
    <header class="header">
        <div class="typewriter">Votre passerelle numérique, à votre service.</div>
        <button class="header-button">Suivez nous</button>
        <div class="feature">
            <div class="feature-header">
                <i id="feature-left" class="fas fa-chevron-left"></i>
                <i class="far fa-newspaper"></i>
                <i id="feature-right" class="fas fa-chevron-right"></i>
            </div>
            <div class="feature-body">
                <div class="feature-carousel" id="carousel-feature">
                    <iframe src="https://www.youtube.com/embed/ra3rF4b6O3E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe src="https://www.youtube.com/embed/ra3rF4b6O3E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe src="https://www.youtube.com/embed/ra3rF4b6O3E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <h2 class="title-2">Ne ratez pas...</h2>
                </div>
                <div class="dynamic-post-container" id="carousel-communication">
                    @for($i = 0; $i < 3; $i++)
                    <div class="dynamic-post event">
                        <div class="post-content">
                            <h3 class="title-4 text-italic">{{ $articles[$i]->title }}</h3>
                            <p class="text-main">{{ $articles[$i]->getExtrait() }}</p>
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
                    <h2 class="title-2">Nos formations débutent bientôt...</h2>
                </div>
                <div class="formations-body" id="carousel-formations">
                    @for($i = 0; $i < 3; $i++)
                    <div class="formations-tile">
                        <div class="tile-head">
                            <h1 class="title-4">Développeur Web et Web mobile</h1>
                        </div>
                        <div class="tile-body">
                            <div class="tile-info">
                                <i class="far fa-clock"></i> 700 H
                            </div>
                            <div class="tile-info">
                                <i class="far fa-calendar-alt"></i> 12/06/19
                            </div>
                            <div class="tile-info">
                                <i class="fas fa-map-marker-alt"></i> Etaples
                            </div>
                            <div class="tile-info">
                                <i class="fas fa-chevron-right"></i><a href="">Voir...</a>
                            </div>
                        </div>
                    </div>
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
            <div class="calendar">
                <img src="images/test.png" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/typewriter.js"></script>
<script src="/js/accueil.js"></script>
@endsection
