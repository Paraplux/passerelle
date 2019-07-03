<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <link rel="shortcut icon" href="/images/logos/favicon-bis.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site officielle de la Passerelle Numérique des Hauts de France">
        <meta name="keywords" content="web dev, web, dev, design, website, developper, site, internet, devis, professionnel, numérique, passerelle, passerelle numérique, insertion, aide, accompagnement, entreprises">
        <title>@yield('title')</title>


        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/navigation.css">
        <link rel="stylesheet" href="/css/footer.css">
        
        @yield('style')

    </head>

<body class="scroll-home">

<!-- BARRE DE NAVIGATION -->
<div class="navigation-container transparent">
    <div id="toggleLateral" class="btn-pins transparent">
        <i class="fas fa-bars"></i>
    </div>
    <div class="logo-container">
        <a href="/"><img src="/images/logos/logo-trans.png" alt="" class="navigation-logo transparent"></a>
    </div>
    <div class="quick-actions-container btn-pins transparent">
        <i id="quickActionOpen" class="fas fa-plus"></i>
        <div class="quick-actions">
            <div id="searchOpen" class="quick-item"><i class="fas fa-search"></i></div>
            <a href="{{ route('contact') }}" class="quick-item"><i class="far fa-envelope"></i></a>
            <div id="proModalOpen" class="quick-item"><i class="fas fa-exchange-alt"></i></div>
        </div>
    </div>
</div>

<!-- MENU LATERAL -->
<div class="navigation-lateral">
    <div class="lateral-head">
        <a href="{{ route('governator') }}" class="head-link">Page d'administration</a>
        <a href="{{ route('partenaire') }}" class="head-link">Le groupe Passerelle</a>
        <a href="{{ route('map') }}" class="head-link">Cartographie</a>
        <a href="{{ route('engagements') }}" class="head-link">Nos engagements</a>
    </div>
    <div class="lateral-body">

        <a title="S'informer sur les métiers d'aujourd'hui et de demain" href="{{ route('sensibiliser') }}" class="body-link">Sensibiliser<i class="fas fa-bullhorn"></i></a>

        <a title="Se former sur les différents métiers d'aujourd'hui et de demain" href="{{ route('se-former') }}" class="body-link">Se former<i class="fas fa-graduation-cap"></i></a>

        <a title="Vous accompagner de manière individualisée selon vos besoins" href="{{ route('accompagner') }}" class="body-link">Accompagner<i class="far fa-handshake"></i></a>

        <a title="L'innovation numérique au coeur de l'avenir" href="{{ route('innover') }}" class="body-link">Innover<i class="far fa-lightbulb"></i></a>

        <a title="Découvrir les nouvelles modalités d'apprentissage" href="{{ route('apprendre') }}" class="body-link">Apprendre<i class="fas fa-brain"></i></a>

        <a title="S'initier au numérique du quotidien" href="{{ route('utiliser') }}" class="body-link">Utiliser<i class="far fa-hand-pointer"></i></a>

        <a title="A définir" href="{{ route('partager') }}" class="body-link">Partager<i class="fas fa-hands"></i></a>

    </div>
</div>

<!-- BACKGROUND ASSOMBRI -->
<div class="dark-background"></div>

<!-- FIX POUR LA NAVBAR FIXE -->
<div class="nav-fix"></div>

<!-- POP UP DE RECHERCHE -->
<div class="search-modal">
    <i id="searchClose" class="fas fa-times"></i>
    <div>Entrez votre recherche</div>
    <form action="/search" method="GET">
        <input id="queryInput" type="text" name='query' placeholder="Mots clé, etc..." autofocus><br><br>
        <input type="reset" value="Annuler" id="cancelSearch">
        <input type="submit" value="OK">
    </form>
</div>

<!-- POP UP PARTICULIER / PROFESSIONNEL -->
<div class="pro-modal">
    <i id="proModalClose" class="fas fa-times"></i>
    <h1 class="title-3">Vous êtes ?</h1>
    <div class="pro-modal-buttons">
        <div class="pro-modal-icons">
            <i class="fas fa-user-alt"></i>
            <i class="fas fa-exchange-alt"></i>
            <i class="fas fa-user-tie"></i>
        </div>
        <a href="/choix-category/part" id="togglePart" class="pro-modal-button">UN PARTICULIER</a>
        <a href="/choix-category/pro" id="togglePro" class="pro-modal-button">UN PROFESSIONNEL</a>
    </div>
    <p class="text-muted">Personnalisez votre expérience sur Passerelle Numérique</p>
    <span class="text-muted">Par défaut : particulier</span>
</div>

<!-- DYNAMIC CONTENT -->

@yield('content')


<footer class="footer">
    <div class="informations">
        <img src="/images/logos/logo-trans.png" alt="">
        <div class="social-icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fab fa-twitter"></i>
        </div>
    </div>
    <div class="navigation">
        <div class="navigation-numerique">
            <h4>Agir</h4>
            <a href="{{ route('se-former') }}" class="">Se former</a>
            <a href="{{ route('innover') }}" class="">Innover</a>
            <a href="{{ route('utiliser') }}" class="">Utiliser</a>
            <a href="{{ route('apprendre') }}" class="">Apprendre</a>
        </div>
        <div class="navigation-passerelle">
            <h4>Coopérer</h4>
            <a href="{{ route('accompagner') }}" class="">Accompagner</a>
            <a href="{{ route('sensibiliser') }}" class="">Sensibiliser</a>
            <a href="{{ route('partager') }}" class="">Partager</a>
        </div>
        <div class="navigation-more">
            <h4>Qui sommes nous ?</h4>
            <a href="" class="">Passerelle & moi</a>
            <a href="" class="">Nos engagements</a>
            <a href="{{ route('partenaire') }}" class="">Nos partenaires</a>
            <a href="{{ route('contact') }}" class="">Nous contacter</a>
        </div>
    </div>
    <div class="about"></div>
</footer>



<!-- EXTERNAL SCRIPTS -->
<script src="/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
{{-- <script src="https://kit.fontawesome.com/728266044f.js"></script> --}}
<script src="/js/fontawesome.js"></script>
<!-- INTERNAL SCRIPTS -->
<script src="/js/functions.js"></script>
<script src="/js/navigation.js"></script>




<!-- DYNAMIC SCRIPTS -->

@yield('script')

</body>
</html>
