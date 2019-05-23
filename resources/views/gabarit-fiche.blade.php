@extends('public-layout')

@section('title')
Formation : {{ $fiche->name }}
@endsection

@section('style')
<link rel="stylesheet" href="/css/gabarit-fiche.css">
@endsection

@section('content')
<div class="background-container">
    <img src="https://cdn.stocksnap.io/img-thumbs/960w/SCC00WCQ3I.jpg" alt="" class="background">
</div>
<div class="template-fiche">
    <div class="fiche-head">
        <div class="title-1">
            <div class="libelle-1">{{ $fiche->name }}</div>
            <div class="libelle-2">{{ $fiche->branche->name }}</div>
        </div>
        <div class="logos">
            <div class="structure">
                <img src="https://www.aifor.fr/images/Favicon-AIFOR.png" alt=""></div>
            <div class="labels">
                <img src="https://www.grandeecolenumerique.fr/wp-content/uploads/2018/11/GEN-80x80.png" alt="">
                <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/80/Logo_Hauts-de-France_2016.svg/320px-Logo_Hauts-de-France_2016.svg.png" alt="">
            </div>
        </div>
    </div>
    <div class="informations">
        <nav class="informations-navigation">
            <span data-target="description" class="is-active"><i class="fas fa-info-circle"></i>Description</span>
            <span data-target="programme"><i class="fas fa-list-alt"></i> Programme</span>
        </nav>
        <div target="description" visible>
            {{ $fiche->content }}
        </div>
        <div target="programme">
            {{ $fiche->program }}
        </div>
    </div>
    <div class="fiche-content">
        <div class="fiche-mosaic">
            <div class="mosaic-item"><i class="fas fa-tasks"></i></div>
            <div class="mosaic-item"><i class="far fa-clock"></i></div>
            <div class="mosaic-item"><i class="fas fa-euro-sign"></i></div>
            <div class="mosaic-item"><i class="fas fa-file-pdf"></i></div>
            <div class="mosaic-item"><i class="fas fa-user-check"></i></div>
            <div class="mosaic-item"><i class="far fa-envelope"></i></div>
        </div>
        <div class="map">
            <div id="mapid"></div>
        </div>
        <i class="map-close fas fa-times-circle"></i>
    </div>
    <div class="map-button">
        <i class="fas fa-map-marker-alt"></i>
        <h5>
            Où trouver cette formation ?
        </h5>
    </div>
</div>
@endsection

@section('script')
<script src="/js/gabarit-fiche.js"></script>
@endsection