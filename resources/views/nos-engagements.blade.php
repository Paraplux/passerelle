@extends('public-layout')

@section('title', 'Nos Engagements')

@section('style')
<link rel="stylesheet" href="/css/nos-engagements.css">
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
<link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="page-engagement">
    <h1 class="title-1">Notre Charte d'Engagement</h1>
    <div class="banner-container">
        <img class="banniere" src="/images/icons/banniere-ordi.svg" alt="">
        <h1 class="title-top title-2">Passerelle</h1>
        <h1 class="title-bot title-2">Numerique</h1>
    </div>

    <div class="article">
        <div class="charte-intro">
            {{ $data['charte']->intro }}
        </div>
        <div class="article-v1 article">
            <h1 class="title-2">{{ $data['keyword'][0]->name }}</h1>
            <i class="icon-1 fas fa-bullhorn"></i>
            <p>{{ $data['keyword'][0]->clique }}</p>
        </div>
        <hr>
        <div class="article-v2 article">
            <h1 class="title-2">{{ $data['keyword'][1]->name }}</h1>
            <i class="icon-2 fas fa-graduation-cap"></i>
            <p>{{ $data['keyword'][1]->clique }}</p>
        </div>
        <hr>
        <div class="article-v1 article">
            <h1 class="title-2">{{ $data['keyword'][2]->name }}</h1>
            <i class="icon-3 far fa-handshake"></i>
            <p>{{ $data['keyword'][2]->clique }}</p>
        </div>
        <hr>
        <div class="article-v2 article">
            <h1 class="title-2">{{ $data['keyword'][3]->name }}</h1>
            <i class="icon-4 far fa-lightbulb"></i>
            <p>{{ $data['keyword'][3]->clique }}</p>
        </div>
        <hr>
        <div class="article-v1 article">
            <h1 class="title-2">{{ $data['keyword'][4]->name }}</h1>
            <i class="icon-5 fas fa-brain"></i>
            <p>{{ $data['keyword'][4]->clique }}</p>
        </div>
        <hr>
        <div class="article-v2 article">
            <h1 class="title-2">{{ $data['keyword'][5]->name }}</h1>
            <i class="icon-6 far fa-hand-pointer"></i>
            <p>{{ $data['keyword'][5]->clique }}</p>
        </div>
        <hr>
        <div class="article-v1 article">
            <h1 class="title-2">{{ $data['keyword'][6]->name }}</h1>
            <i class="icon-7 fas fa-hands"></i>
            <p>{{ $data['keyword'][6]->clique }}</p>
        </div>
        <div class="charte-outro">
            {{ $data['charte']->outro }}
        </div>
    </div>

</div>








@endsection

@section('script')
<script src="/js/nos-engagements.js"></script>
@endsection



