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
    <p class="text-muted page-intro">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum sed eveniet fugiat, atque consectetur ullam, officia dolore veniam doloremque optio, ducimus repudiandae deserunt. Saepe cum amet dolore culpa eius voluptatem! Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto sit hic illum pariatur placeat ipsum soluta? Doloremque dolor, unde libero perferendis inventore magni reprehenderit? Reprehenderit voluptatem aliquam et recusandae ipsam!</p><br>

    <h1 class="title-2 page-subtitle">Les fondateurs de Passerelle Numérique</h1>
    <div class="cards-container fondateurs">
        @foreach($fondateurs as $fondateur)
        <div class="card" aria-expanded="false">
            <div class="thumb">
                <img src="{{ $fondateur->logo }}" alt="">
            </div>
            <div class="body">
                    <h1 class="card-title">{{ $fondateur->name }}</h1>
                    <div class="fondateurs-info"><i class="fas fa-globe"></i>{{ $fondateur->website }}</div>
                    <div class="fondateurs-info"><i class="fas fa-at"></i>{{ $fondateur->mail }}</div>
                    <div class="fondateurs-info"><i class="fas fa-city"></i>{{ $fondateur->adress }} - {{ $fondateur->city }}</div>
                    <div class="fondateurs-info"><i class="fas fa-phone"></i>{{ $fondateur->phone }}</div>
            </div>
        </div>
        @endforeach
    </div>
    <h1 class="title-2 page-subtitle">Nos signataires</h1>
    <div class="cards-container signataires">
        @foreach($signataires as $signataire)
        <div class="card" aria-expanded="false">
            <div class="thumb">
                <img src="{{ $signataire->logo }}" alt="">
            </div>
            <div class="body">
                    <h1 class="card-title">{{ $signataire->name }}</h1>
                <ul>
                    <li><i class="fas fa-globe"></i> : {{ $signataire->website }}</li>
                    <li><i class="fas fa-at"></i> : {{ $signataire->mail }}</li>
                    <li><i class="fas fa-city"></i> :  {{ $signataire->adress }} - {{ $signataire->city }}</li>
                    <li><i class="fas fa-phone"></i> : {{ $signataire->phone }}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <h1 class="title-2 page-subtitle">Nos partenaires</h1>
    <div class="cards-container partenaires">
        @foreach($partenaires as $partenaire)
        <div class="card" aria-expanded="false">
            <div class="thumb">
                <img src="{{ $partenaire->logo }}" alt="">
            </div>
            <div class="body">
                    <h1 class="card-title">{{ $partenaire->name }}</h1>
                <ul>
                    <li><i class="fas fa-globe"></i> : {{ $partenaire->website }}</li>
                    <li><i class="fas fa-at"></i> : {{ $partenaire->mail }}</li>
                    <li><i class="fas fa-city"></i> :  {{ $partenaire->adress }} - {{ $partenaire->city }}</li>
                    <li><i class="fas fa-phone"></i> : {{ $partenaire->phone }}</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script src="/js/jqueryui.js"></script>
<script src="/js/partenaires.js"></script>
@endsection