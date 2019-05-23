@extends('public-layout')

@section('title', 'Se Former')

@section('style')
<link rel="stylesheet" href="/css/scroll-lat.css">
<link rel="stylesheet" href="/css/formations.css">
@endsection

@section('content')
<div class="search-container">
    <img src="https://cdn.stocksnap.io/img-thumbs/960w/OO7XQL3Q9C.jpg" alt="" class="search-background">
    <div class="typewriter">Besoin d'une formation numérique ?</div>
        <div class="input-field">
            <form action="/se-former/search" method="GET">
                <input name="query" type="text" placeholder="Formation, métiers, numérique, . . .">
            </form>
            <img src="images/icons/search.png" alt="">
    </div>
    </div>
    <div class="formations-content">
        <h1 class="title-1 scroll-anchor">Nos formations</h1>
        @if(isset($search))
        <h2 id="searchResults" class="title-3">Résultats pour : "{{ $query }}"</h2>
            @foreach($search as $result)
                <p>{{ $result->name }} -> <a href="/formation/{{ $result->id }}">Voir la fiche</a></p>
            @endforeach
        @endif
    </div>
@endsection

@section('script')

<script src="/js/typewriter.js"></script>
<script src="/js/scroll-lat.js"></script>
@if(isset($search))
<script>
    const thisTop = window.pageYOffset
    const thisLeft = window.pageXOffset
    jump('.scroll-anchor', thisTop, thisLeft)
</script>
@endif
@endsection