@extends('public-layout')

@section('title', 'Utiliser')

@section('style')
<link rel="stylesheet" href="/css/utiliser.css">
<link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
@endsection

@section('content')

<div class="utiliser-page white">

        <div class="header">
            <div class="title">
                <h1 class="title-1">Utiliser</h1>
                <p class="text-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?</p>
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
                    <img src="/images/template/background-1.jpg" alt="">
                    <div class="section-article-text">
                        <h1 class="title-2">Accompagner</h1>
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
    
        </div> <!--/div.section -->
    
    </div> <!-- /div.utiliser-page -->
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/utiliser.js"></script>

<script> var codropsEvents = {!! json_encode($events) !!}; </script>
<script src="/js/calendar.js"></script>
@endsection



