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
        <div class="fiche-accordion">
            <div class="accordion-item">
                <p class="accordion-title accordion-title-1"><i class="fas fa-tasks"></i> Pré Requis</p>
                <p class="accordion-content">{{ $fiche->pre_requisite }}</p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-2"><i class="far fa-clock"></i> Dates & Durée</p>
                <p class="accordion-content">
                         - {{ $fiche->date_start }} <br>
                         - {{ $fiche->date_end }} <br>
                         - {{ $fiche->duree }} <br>
                </p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-3"><i class="fas fa-map-marker-alt"></i> Location</p>
                <p class="accordion-content">{{ $fiche->location }}</p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-4"><i class="fas fa-file-pdf"></i> Documentation</p>
                <p class="accordion-content">Téléchargez la version pdf de la fiche ! </p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-5"><i class="fas fa-user-check"></i> Lorem</p>
                <p class="accordion-content">Je sais plus ce qui va ici</p>
            </div>
            <div class="accordion-item">
                <p class="accordion-title accordion-title-6"><i class="far fa-envelope"></i> Contact</p>
                <p class="accordion-content">
                         - Nom de la structure <br>
                         - Téléphone de la structure <br>
                         - Adresse mail de la structure <br>
                         - Website de la structure <br>
                         - Adress postale de la structure <br>
                         - Ville & de la structure <br>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/gabarit-fiche.js"></script>
@endsection