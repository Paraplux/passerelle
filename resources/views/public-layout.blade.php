<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <link rel="shortcut icon" href="/images/logos/favicon-bis.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
        <a href="/"><img src="/images/logos/logo-trans.png" alt="" class="logo transparent"></a>
    </div>
    <div class="quick-actions-container btn-pins transparent">
        <i id="quickActionOpen" class="fas fa-plus"></i>
        <div class="quick-actions">
            <div id="searchOpen" class="quick-item"><i class="fas fa-search"></i></div>
            <div class="quick-item"><i class="fas fa-calendar-alt"></i></div>
            <div class="quick-item"><i class="far fa-envelope"></i></div>
        </div>
    </div>
</div>

<!-- MENU LATERAL -->
<div class="navigation-lateral">
    <div class="lateral-head">
        <div class="head-link">TRAVAUX EN COURS (ci dessous)</div>
        <a href="{{ route('governator') }}" class="head-link">Page d'administration</a>
        <a href="{{ route('faq') }}" class="head-link">Page Faq</a>
    </div>
    <div class="lateral-body">
        <a href="{{ route('decouvrir') }}" class="body-link"><i class="fas fa-question-circle"></i>Découvrir</a>
        <a href="{{ route('se-former') }}" class="body-link"><i class="fas fa-question-circle"></i>Se former</a>
        <a href="" class="body-link"><i class="fas fa-question-circle"></i>Accompagner</a>
        <a href="" class="body-link"><i class="fas fa-question-circle"></i>Innover</a>
        <a href="" class="body-link"><i class="fas fa-question-circle"></i>Apprendre</a>
        <a href="" class="body-link"><i class="fas fa-question-circle"></i>Utiliser</a>
        <a href="" class="body-link"><i class="fas fa-question-circle"></i>Partager</a>
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
            <h4>Quoi ?</h4>
            <a href="../formations" class="">Nos formations</a>
            <a href="" class="">Le numérique</a>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
        </div>
        <div class="navigation-passerelle">
            <h4>Qui ?</h4>
            <a href="" class="">Nos engagements</a>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
        </div>
        <div class="navigation-more">
            <h4>Allez plus loin ?</h4>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
            <a href="" class="">Autre lien</a>
        </div>
    </div>
    <div class="about"></div>

</footer>

<!-- EXTERNAL SCRIPTS -->
<script src="/js/jquery.js"></script>
<!-- INTERNAL SCRIPTS -->
<script src="/js/functions.js"></script>
<script src="/js/navigation.js"></script>

<!-- DYNAMIC SCRIPTS -->
@yield('script')
</body>
</html>
