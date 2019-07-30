<div class="listing-container">

<table>
    <p style="text-align: left;" class="text-muted"><i class="fas fa-exclamation-circle"></i> Attention, la modération ne doit pas servir à censurer ni à réécrire ou reformuler une question/réponse. Elle n'a pour but que de modérer les propos diffamatoires, racistes, homophobes ou tout autre propos portant atteinte à l'intégrité d'un tiers. </p>
    <tr>
        <td>Question</td>
        <td>E-mail</td>
        <td>Posée le</td>
        <td>Actions</td>
    </tr>
    @if(!empty($data['question']))
    @foreach($data['question'] as $question)
    <tr>
            <td>{!! $question->question !!}</td>
            <td>{{ $question->mail }}</td>
            <td>{{ $question->created_at }}</td>
            <td>
                <a href="/governator/master/{{ $model }}/edit/{{ $question->id }}" class="text-info">Modérer</a> -
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette entrée de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $question->id }}" class="text-danger">Supprimer</a>
            </td>
    </tr>
    <tr>
        <td>Réponse</td>
        <td>E-mail</td>
        <td>Postée le</td>
        <td>Actions</td>
    </tr>
    @if(!empty($question->reponses))
    @foreach($question->reponses as $reponse)
    <tr>
        <td>{!! $reponse->reponse !!}</td>
        <td>{{ $reponse->mail }}</td>
        <td>{{ $reponse->created_at }}</td>
        <td>
            <a href="/governator/master/reponse/edit/{{ $reponse->id }}" class="text-info">Modérer</a> -
            <a onclick="if(confirm('Souhaitez vous réellement supprimer cette entrée de la base de données ?')){return true;}else{return false;}" href="/governator/delete/reponse/{{ $reponse->id }}" class="text-danger">Supprimer</a>
        </td>
    </tr>
    @endforeach
    @endif
    @endforeach
    @endif
</table>
</div>
