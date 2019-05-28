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
    <h1 class="title-1">Nos partenaires (wip)</h1>
    @if(isset($partenaires) && count($partenaires) != 0)
    <div class="partenaires-container">
        @foreach($partenaires as $partenaire)
        <div class="partenaire">
            <img class="logo" src="{{ $partenaire->logo }}" alt="">
        	<p>{{ $partenaire->name }} -> <a target="_blank" href="{{ $partenaire->website }}">Voir le site</a></p>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@section('script')

@endsection