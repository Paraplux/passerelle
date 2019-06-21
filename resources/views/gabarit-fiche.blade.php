@extends('public-layout')

@section('title')
Formation : {{ $fiche->name }}
@endsection

@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>
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
        <div class="structure">
            <img src="{{ $fiche->structure->logo }}" alt="">
        </div>
    </div>
    <div class="informations">
        <nav class="informations-navigation">
            <span data-target="description" class="is-active"><i class="fas fa-info-circle"></i>Description</span>
            <span data-target="programme"><i class="fas fa-list-alt"></i> Programme</span>
        </nav>
        <div target="description" visible>
            {!! $fiche->content !!}
        </div>
        <div target="programme">
            {!! $fiche->program !!}
        </div>
    </div>
    <div class="fiche-content">
        <div class="fiche-accordion">
            <div class="accordion-item">
                <p class="accordion-title accordion-title-1"><i class="fas fa-map-marker-alt"></i> Location</p>
                <div id="ficheMap" class="accordion-content"></div>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-2"><i class="fas fa-tasks"></i> Pré Requis</p>
                <div class="accordion-content">{!! $fiche->pre_requisite !!}</div>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-3"><i class="far fa-clock"></i> Dates & Durée</p>
                <p class="accordion-content">
                         - {{ $fiche->date_start }} <br>
                         - {{ $fiche->date_end }} <br>
                         - {{ $fiche->duree }} heures <br>
                </p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-4"><i class="fas fa-file-pdf"></i> Documentation</p>
                <p class="accordion-content">Téléchargez la version pdf de la fiche ! </p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-5"><i class="fas fa-user-check"></i>A définir</p>
                <p class="accordion-content">A définir</p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-6"><i class="far fa-envelope"></i> Contact</p>
                <p class="accordion-content">
                         - {{ $fiche->structure->name }} <br>
                         - {{ $fiche->structure->phone }} <br>
                         - {{ $fiche->structure->mail }} <br>
                         - {{ $fiche->structure->website }} <br>
                         - {{ $fiche->structure->adress }} <br>
                         - {{ $fiche->structure->commune->nom_commune }} <br>
                </p>
            </div>
        </div>
    </div>
    <div class="labels">
            
        </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>

<script src="/js/gabarit-fiche.js"></script>

<script>
var map = L.map('ficheMap').setView([{!! $fiche->structure->commune->coords !!}], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

let title = '<strong>Nous sommes ici</strong>'

L.marker([{!! $fiche->structure->commune->coords !!}]).addTo(map)
    .bindPopup(title)
    .openPopup();
</script>
@endsection



