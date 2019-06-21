@extends('public-layout')

@section('title', 'Innover')

@section('style')
<link rel="stylesheet" href="/css/utiliser.css">
<link rel="stylesheet" href="/css/carousel.css">
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
<link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
@endsection

@section('content')

<div id="decouvrir-page" class="decouvrir-page white">
<div id="header" class="header">

        <!-- ^flex -->
    <div class="title">
            <!-- ^width 50% -->
        <h1 class="title-1">Utiliser</h1>
        <p class=text-title>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo
                molestiae expedita neque similique eveniet?</p>
          <img class="light-on light" src="/svg/light-on.svg" alt=""/>
          <p class="neon">Clique ici -></p>
          <img id="b1" class="phone-on phone" src="/svg/smartphone-light-on.svg" alt=""/>
          <img class="light-off light" src="/svg/light-off.svg" alt=""/>

        </div>
      </div>
    
    <div id="calendar" class="calendar-container">
        <!-- ^width 50% -->
                <div class="card">
                    <div class="front">
                        <div class="contentfront">
                            <div class="month">
                                <table>
                                    <tr class="orangeTr">
                                        <th>M</th>
                                        <th>M</th>
                                        <th>J</th>
                                        <th>V</th>
                                        <th>S</th>
                                        <th>D</th>
                                        <th>L</th>
                                    </tr>
                                    <tr class="whiteTr">
                                        <th></th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                    </tr>
                                    <tr class="whiteTr">
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                    </tr>
                                    <tr class="whiteTr">
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
                                        <th>20</th>
                                    </tr>
                                    <tr class="whiteTr">
                                        <th>21</th>
                                        <th>22</th>
                                        <th>23</th>
                                        <th>24</th>
                                        <th>25</th>
                                        <th>26</th>
                                        <th>27</th>
                                    </tr>
                                    <tr class="whiteTr">
                                        <th>28</th>
                                        <th>29</th>
                                        <th>30</th>
                                        <th>31</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="date">
                                <div class="datecont">
                                    <div id="date"></div>
                                    <div id="day"></div>
                                    <div id="month"></div>
                                    <i class="fa fa-pencil edit" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        -<div class="contentback">
                            <div class="backcontainer">
                                Affichage des évènements
                            </div>
                        </div>-
                    </div>
                </div>
            </div>
    <div id="body" class="body">

        <div class="decouvrir-article">

            <img src="/images/template/background-1.jpg" alt="">
            <div class="decouvrir-article-text">
                <h1>Utiliser</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a
                    illo molestiae expedita neque similique eveniet? Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique
                    eveniet?Lorem ipsum dolor sit retro wave adipisicing elit Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita
                    neque similique eveniet?</p>
            </div>
        </div>

            
    </div>

    <div class="dynamic-post-container" id="carousel-communication">
        <div class="dynamic-post event">
            <div class="post-content">
                <h3 text-italic">Titre de l'événement</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa
                    harum quam ullam corrupti, nobis abodit ipsa! Est corrupti voluptates consectetur,
                    expedita eius facere saepe quam nostrum quos.</p>
            </div>
            <div class="post-thumb">
                <img src="/images/landscape01.jpg" alt="">
            </div>
        </div>
        <div class="dynamic-post news">
            <div class="post-content">
                <h3 text-italic">Titre de l'actualité</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa
                    harum quam ullam corrupti, nobis aboditipsa! Est corrupti voluptates consectetur,
                    expedita eius facesaepe quam nostrum quos repellat.</p>
            </div>
            <div class="post-thumb">
                <img src="/images/landscape02.jpg" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/utiliser.js"></script>
@endsection



