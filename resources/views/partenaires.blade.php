@extends('public-layout')

@section('title')
Nos partenaires
@endsection

@section('style')
    <link rel="stylesheet" href="/css/partenaires.css">
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<div class="partenaires-page">
    <h1 class="title-1 page-title">Notre groupe</h1>
    <p class="text-muted page-intro">{{ $content->partenaires_text }}</p><br>

    <div class="partenaires-videos">
        <div class="video">
            <iframe width="560" height="315"  src="https://www.youtube.com/embed/q_ml2w1Mu-g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="video">
            <iframe width="560" height="315"  src="https://www.youtube.com/embed/bG7n9JwfG5Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="video">
            <iframe width="560" height="315"  src="https://www.youtube.com/embed/JoHBGrYEhns" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <h1 class="title-2 page-subtitle">Les fondateurs de Passerelle Numérique</h1>
    <div class="cards-container fondateurs">
        @foreach($fondateurs as $fondateur)
        <div class="card" aria-expanded="false">
            <div class="thumb">
                <a href="/groupe-passerelle/{{ $fondateur->id }}"><img src="{{ $fondateur->logo }}" alt=""></a>
            </div>
            <div class="body">
                <h1 class="card-title title-3">{{ $fondateur->name }}</h1>
                <div class="fondateurs-info"><i class="fas fa-globe"></i><a href="{{ $fondateur->website }}">Visitez le site</a></div>
                <div class="fondateurs-info"><i class="fas fa-at"></i>{{ $fondateur->mail }}</div>
                <div class="fondateurs-info"><i class="fas fa-city"></i>{{ $fondateur->adress }} - {{ $fondateur->commune->nom_commune }}</div>
                <div class="fondateurs-info"><i class="fas fa-phone"></i>{{ $fondateur->phone }}</div>
            </div>
        </div>

        @endforeach
    </div>
    <h1 class="title-2 page-subtitle">Nos signataires</h1>
    <div class="cards-container signataires">
        @foreach($signataires as $signataire)
        <a href="/groupe-passerelle/{{ $signataire->id }}"><img src="{{ $signataire->logo }}" alt=""></a>
        @endforeach
    </div>
    <h1 class="title-2 page-subtitle">Nos partenaires</h1>
    <div class="cards-container partenaires">
        @foreach($partenaires as $partenaire)
        <a href="/groupe-passerelle/{{ $partenaire->id }}"><img src="{{ $partenaire->logo }}" alt=""></a>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script src="/js/jqueryui.js"></script>
<script src="/js/partenaires.js"></script>
@endsection