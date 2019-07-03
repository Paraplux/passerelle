@extends('administration-layout')


@section('content')

<div class="manager-navbar">
    <a class="logout-link" href="/governator/logout">Se déconnecter</a>
</div>

<div class="manager-container">
    <p class="title-4">Bienvenue sur votre espace Passerelle Numérique</p>

    <div class="actions-container">
        <div class="fiches-container">
            <p>Fiches actions</p>
            <a class="add" href="/governator/manager/fiche/create">
                <i class="fa fa-plus-circle plus-icon" aria-hidden="true"></i>
                <i class="far fa-file-alt fiche-icon"></i>
            </a>
            <a class="list" href="/governator/manager/fiche/list">
                <i class="fa fa-list list-icon" aria-hidden="true"></i>
                <i class="far fa-file-alt fiche-icon"></i>
            </a>
        </div>
        <div class="articles-container">
            <p>Articles</p>
            <a class="add" href="/governator/manager/article/create">
                <i class="fa fa-plus-circle plus-icon" aria-hidden="true"></i>
                <i class="far fa-newspaper article-icon"></i>
            </a>
            <a class="list" href="/governator/manager/article/list">
                <i class="fa fa-list list-icon" aria-hidden="true"></i>
                <i class="far fa-newspaper article-icon"></i>
            </a>
        <div class="events-container">
            <p>Evènements</p>
            <a class="add" href="/governator/manager/event/create">
                <i class="fa fa-plus-circle plus-icon" aria-hidden="true"></i>
                <i class="far fa-calendar-alt calendar-icon"></i>
            </a>
            <a class="list" href="/governator/manager/event/list">
                <i class="fa fa-list list-icon" aria-hidden="true"></i>
                <i class="far fa-calendar-alt calendar-icon"></i>
            </a>
        </div>
    </div>
</div>

@endsection