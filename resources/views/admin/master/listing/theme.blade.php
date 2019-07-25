{{--

    Home :
        - La photo de la page d'accueil
        - Les deux sous titres

    Le groupe passerelle :
        - Le petit texte d'introduction

    Se former :
        - La photo de fond

    La cartographie :
        - Le petit texte d'introduction

    Contact :
        - Le petit texte sous le formulaire

    Réseaux Sociaux :
        - Les liens des réseaux sociaux

--}}

<div class="create-container">

    <form action="/governator/master/theme/edit" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <br>
        <h1 class="title-3">Modifier le contenu de Passerelle Numérique</h1>

        <h2 class="title-4">Page d'accueil : </h2>
        <div class="form-group">
            <label for="accueil_thumb">Image de fond : </label>
            <img id="accueil_thumb" class="theme-thumb" src="{{ $data['contenu']->accueil_thumb }}" alt="">
            <input type="file" name="accueil_thumb">
            <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Veillez à choisir une illustration de qualité afin de garantir un rendu parfait.</p>
        </div>
        <div class="form-group">
            <label for="accueil_news_subtitle">Sous-titre du carousel d'actualités : </label>
            <input value="{{ $data['contenu']->accueil_news_subtitle }}" type="text" name="accueil_news_subtitle" id="accueil_news_subtitle">
        </div>
        <div class="form-group">
            <label for="accueil_formations_subtitle">Sous-titre du carousel de formations : </label>
            <input value="{{ $data['contenu']->accueil_formations_subtitle }}" type="text" name="accueil_formations_subtitle" id="accueil_formations_subtitle">
        </div>
        
        <h2 class="title-4">Page Se former : </h2>
        <div class="form-group">
            <label for="formations_thumb">Image de fond : </label>
            <img id="formations_thumb" class="theme-thumb" src="{{ $data['contenu']->formations_thumb }}" alt="">
            <input type="file" name="formations_thumb">
            <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Veillez à choisir une illustration de qualité afin de garantir un rendu parfait.</p>
        </div>

        <h2 class="title-4">Page du groupe Passerelle Numérique : </h2>
        <div class="form-group">
            <label for="theme_ckeditor_1">Texte d'introduction : </label>
            <textarea id="theme_ckeditor_1" name="partenaires_text">{{ $data['contenu']->partenaires_text }}</textarea>
        </div>

        <h2 class="title-4">Page de la cartographie : </h2>
        <div class="form-group">
            <label for="theme_ckeditor_2">Texte d'introduction : </label>
            <textarea id="theme_ckeditor_2" name="map_text">{{ $data['contenu']->map_text }}</textarea>
        </div>

        <h2 class="title-4">Page contact : </h2>
        <div class="form-group">
            <label for="theme_ckeditor_3">Texte d'introduction : </label>
            <textarea id="theme_ckeditor_3" name="contact_text">{{ $data['contenu']->contact_text }}</textarea>
        </div>

        <h2 class="title-4">Gestion des réseaux sociaux : </h2>
        <div class="form-group">
            <label for="fb_link">Lien de la page Facebook : </label>
            <input value="{{ $data['contenu']->fb_link }}" type="text" name="fb_link" id="fb_link">
        </div>
        <div class="form-group">
            <label for="tw_link">Lien de la page Twitter : </label>
            <input value="{{ $data['contenu']->tw_link }}" type="text" name="tw_link" id="tw_link">
        </div>
        <div class="form-group">
            <label for="li_link">Lien de la page LinkedIn : </label>
            <input value="{{ $data['contenu']->li_link }}" type="text" name="li_link" id="li_link">
        </div>
        <div class="form-group">
            <label for="yt_link">Lien de la chaîne Youtube : </label>
            <input value="{{ $data['contenu']->yt_link }}" type="text" name="yt_link" id="yt_link">
        </div>

        <button type="submit">Publier</button>
    </form>
</div>
