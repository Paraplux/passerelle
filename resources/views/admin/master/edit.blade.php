@extends('administration-layout')

@section('content')

@include('admin.master.navigation')

@include('flash')

<div class="create-container">

    @if($model === 'reponse')
    <a href="/governator/master/question/list">Retourner à la liste des entrées</a>
    @else
    <a href="/governator/master/{{ $model }}/list">Retourner à la liste des entrées</a>
    @endif

    
    @if($model === 'partenaire')
        @include('admin.master.edit.partenaire')
    @elseif($model === 'label')
        @include('admin.master.edit.label')
    @elseif($model === 'structure')
        @include('admin.master.edit.structure')
    @elseif($model === 'secteur')
        @include('admin.master.edit.secteur')
    @elseif($model === 'fiche')
        @include('admin.master.edit.fiche')
    @elseif($model === 'article')
        @include('admin.master.edit.article')
    @elseif($model === 'event')
        @include('admin.master.edit.event')
    @elseif($model === 'faq')
        @include('admin.master.edit.faq')
    @elseif($model === 'question')
        @include('admin.master.edit.question')
    @elseif($model === 'reponse')
        @include('admin.master.edit.reponse')
    @elseif($model === 'keyword')
        @include('admin.master.edit.keyword')
    @elseif($model === 'theme')
        @include('admin.master.edit.theme')
    @elseif($model === 'engagement')
        @include('admin.master.edit.engagement')
    @elseif($model === 'user')
        @include('admin.master.edit.user')
    @endif
    
</div>

@endsection