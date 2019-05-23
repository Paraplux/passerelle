@extends('public-layout')

@section('title', 'Découvrir')

@section('style')
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
<link rel="stylesheet" href="/css/decouvrir.css">
<link rel="stylesheet" href="/css/carousel.css">
@endsection

@section('content')

<div class="decouvrir-page">
  <div class="header">
    <!-- ^flex -->
    <div class="title">
      <!-- ^width 50% -->
      <h1>Découvrir</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias molestias corporis vero cupiditate a illo molestiae expedita neque similique eveniet?</p>
    </div>

    
    
  </div>
  <div class="body">
    
    <div class="decouvrir-carousel-container">
      <div class="decouvrir-carousel" id="carousel-decouvrir">
        <img src="/images/template/feature-1.jpg" alt="">
        <img src="/images/template/feature-2.jpg" alt="">
        <img src="/images/template/feature-3.jpg" alt="">
      </div>
    </div>

    <div class="calendar-container">
    <div class="container"">
        <!-- ^width 50% -->
        <div class="card">
          <div class="front">
            <div class="contentfront">
              <div class="month">
                <table>
                  <tr class="orangeTr">
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
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
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="/js/carousel.js"></script>
<script src="/js/decouvrir.js"></script>
<script src="/js/accueil.js"></script>
@endsection