@extends('administration-layout')


@section('content')

<div class="manager-navbar">
    <a href="/governator/manager/{{ $model }}/create">Création</a>
    <a href="/governator/manager">Retour catégories</a>
    <a href="/governator/logout">Se déconnecter</a>
</div>

<div style="width: 90%; margin-left: 5%;" class="listing-container">
    @if($model === 'fiche')
        @include('admin.manager.listing.fiche')
    @elseif($model === 'article')
        @include('admin.manager.listing.article')
    @elseif($model === 'event')
        @include('admin.manager.listing.event')
    @else
    @endif
</div>

@endsection