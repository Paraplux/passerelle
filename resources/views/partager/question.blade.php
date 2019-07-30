@extends('public-layout')

@section('title')
{{ $question->question }}
@endsection

@section('style')
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
    <link rel="stylesheet" href="/css/faq-question.css">
@endsection

@section('content')
<div class="question-page">
    <div class="question-main-content">
        <a href="/partager"><i class="far fa-arrow-alt-circle-left"></i> Retour à la liste des questions</a>

            <!-- QUESTION -->
            <div class="question-item">
                <h1 class="title-1"><i class="fas fa-user"></i> {{ $question->question }}</h1>
                <br>
                <p class="text-main">{{ $question->more }}</p>
                <h3 class="text-muted">{{ $question->pseudo }} - {{ $question->mail }}</h3>
                <h3 class="text-muted">{{ $question->created_at }}</h3>
            </div>
            <br>


            <h2 class="title-2">Réponses</h2>

            @foreach($reponses as $reponse)
            <div class="reponse-item" >
                <h3 class="text-muted">{{ $reponse->pseudo }} - {{ $reponse->mail }}</h3>
                <h3 class="text-muted">{{ $reponse->created_at }}</h3>
                <p class="main-text">{{ $reponse->reponse }}</p>
                <div class="vote">
                    <a href="/partager/up/{{ $reponse->id }}"><i data-thumb="up" class="far fa-thumbs-up"></i><span data-thumb="up">{{ $reponse->thumbs_up }}</span></a>
                    <a href="/partager/down/{{ $reponse->id }}"><i data-thumb="down" class="far fa-thumbs-down"></i><span data-thumb="down">{{ $reponse->thumbs_down }}</span></a>
                </div>
            </div>
            @endforeach

            
            <!-- REPONSES -->
            <h2 class="title-2">Proposer ma réponse</h2>

            <form class="reponse-form" action="/partager/{{ $question->id }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <input name="pseudo" type="text" placeholder="Pseudo">
                    <input name="mail" type="text" placeholder="Adresse mail">
                </div>
                <div class="form-group">
                    <textarea type="text" name="reponse"></textarea>
                </div>
                <button type="submit">Répondre</button>
            </form>

    </div>
</div>
@endsection
