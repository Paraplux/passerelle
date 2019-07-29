@extends('administration-layout')

@section('content')

<div class="manager-navbar">
    <a href="/governator/manager/{{ $model }}/list">Lister les entrées</a>
    <a href="/governator/manager">Retour catégories</a>
    <a href="/governator/logout">Se déconnecter</a>
</div>

@include('flash')

<div style="width: 90%; margin-left: 5%;" class="create-container">

    @if($model === 'fiche')
        @include('admin.manager.create.fiche')
    @elseif($model === 'article')
        @include('admin.manager.create.article')
    @elseif($model === 'event')
        @include('admin.manager.create.event')
    @else
    @endif
    
</div>

@endsection