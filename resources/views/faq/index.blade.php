@extends('public-layout')

@section('title', 'Se Former')

@section('style')
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
    <link rel="stylesheet" href="/css/faq-list.css">
@endsection

@section('content')
<div class="faq-page">
    <div class="faq-head">
        <img src="/images/icons/faq.png" alt="">
        <h1 class="title-1">Foire aux questions</h1>
        <form action="" method="POST">
            <input class="title-4" type="text" placeholder="Cherchez une question...">
        </form>
    </div>
    <div class="faq-main-content">
        <div class="faq-container">
            <h2 class="title-4"><i class="fas fa-question"></i>Retrouvez les questions les plus répandues :</h2>
            <?php $i = 1 ?>
            @foreach($faqs as $faq)
            <div data-target="{{ $i }}" class="faq-item text-blue">
                <p>{{ $faq->question }}<i class="fas fa-chevron-down"></i></p>
                <p data-target="{{ $i }}" class="faq-hidden-item text-main">{{ $faq->reponse }}</p>
            </div>
            <?php $i++; ?>
            @endforeach
        </div>
        <div class="question-container">
            <h2 class="title-4"><i class="fas fa-users"></i>Retrouvez les questions de la communauté :</h2>

            @foreach($questions as $question)
            <div class="question-item">
                <p class="question-pseudo">{{ $question->pseudo }} demande :</p>
                <div class="question">{{ $question->question }}</div>
                <a href="/foire-aux-questions/{{ $question->id }}" class="question-link">Voir les réponses</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="faq-side-content">
        <div class="side-item">
            <form class="question-form" action="/foire-aux-questions/add" method="POST">
            {{ csrf_field() }}
                <h2 class="title-4">Posez votre propre question ?</h2>
                <textarea name="question" placeholder="Intitulé de la question..."></textarea>
                <textarea name="more" placeholder="Détail de la question..."></textarea>
                <input type="email" name="mail" placeholder="Votre adresse email">
                <input type="text" name='pseudo' placeholder="Publiez sous le pseudonyme...">
                <button type="submit">Posez ma question</button>
            </form>
        </div>
        <div class="side-item">
        </div>
        <div class="side-item"></div>
        <div class="side-item"></div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/faq.js"></script>
@endsection