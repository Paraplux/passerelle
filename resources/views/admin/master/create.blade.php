@extends('administration-layout')

@section('content')

@include('admin.master.navigation')

@include('flash')

<div class="create-container">

    <a href="/governator/master/{{ $model }}/list">Retourner à la liste des entrées</a>

    @if($model === 'partenaire')
        @include('admin.master.create.partenaire')
    @elseif($model === 'label')
        @include('admin.master.create.label')
    @elseif($model === 'structure')
        @include('admin.master.create.structure')
    @elseif($model === 'secteur')
        @include('admin.master.create.secteur')
    @elseif($model === 'fiche')
        @include('admin.master.create.fiche')
    @elseif($model === 'article')
        @include('admin.master.create.article')
    @elseif($model === 'event')
        @include('admin.master.create.event')
    @elseif($model === 'faq')
        @include('admin.master.create.faq')
    @elseif($model === 'keyword')
        @include('admin.master.create.keyword')
    @elseif($model === 'theme')
        @include('admin.master.create.theme')
    @elseif($model === 'engagement')
        @include('admin.master.create.engagement')
    @elseif($model === 'user')
        @include('admin.master.create.user')
    @endif
    
</div>

@endsection