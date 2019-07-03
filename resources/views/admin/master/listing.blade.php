@extends('administration-layout')

@section('content')

@include('admin.master.navigation')

@include('flash')

<div class="listing-container">

    <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>

    @if($model === 'partenaire')
        @include('admin.master.listing.partenaire')
    @elseif($model === 'label')
        @include('admin.master.listing.label')
    @elseif($model === 'structure')
        @include('admin.master.listing.structure')
    @elseif($model === 'secteur')
        @include('admin.master.listing.secteur')
    @elseif($model === 'fiche')
        @include('admin.master.listing.fiche')
    @elseif($model === 'article')
        @include('admin.master.listing.article')
    @elseif($model === 'event')
        @include('admin.master.listing.event')
    @elseif($model === 'faq')
        @include('admin.master.listing.faq')
    @elseif($model === 'question')
        @include('admin.master.listing.question')
    @elseif($model === 'keyword')
        @include('admin.master.listing.keyword')
    @elseif($model === 'theme')
        @include('admin.master.listing.theme')
    @elseif($model === 'engagement')
        @include('admin.master.listing.engagement')
    @elseif($model === 'user')
        @include('admin.master.listing.user')
    @endif
    
</div>

@endsection