@extends('public-layout')

@section('title')
{{ $data->name }}
@endsection

@section('style')
    <link rel="stylesheet" href="/css/partenaire.css">
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<div class="partenaire-page">
    <div class="card">
        <h1 class="title-1">{{ $data->name }}</h1>
        <img src="{{ $data->logo }}" alt="">
        <p>
            <a href="{{ $data->website }}"><i class="fas fa-globe"></i> : Visitez le site web</a>
            <div><i class="fas fa-at"></i> : {{ $data->mail }}</div>
            <div><i class="fas fa-phone"></i> : {{ $data->phone }}</div>
            <div><i class="fas fa-city"></i> : {{ $data->adress }} - {{ $data->commune->nom_commune }}</div>
        </p>
    </div>
</div>
@endsection

@section('script')
<script src="/js/jqueryui.js"></script>
<script src="/js/partenaire.js"></script>
@endsection