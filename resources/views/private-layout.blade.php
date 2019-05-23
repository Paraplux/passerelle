<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <link rel="shortcut icon" href="/images/logos/favicon-bis.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/app.css">
        @yield('style')

    </head>

<body>

<div class="admin-wrap">
    <div class="container">
        <div class="navigation">
            <div class="navigation-group">
                <p>Formations</p>
                <a href="/governator/formations/fiche">Ajouter une fiche formation</a>
                <a href="/governator/formations/label">Ajouter un label</a>
                <a href="/governator/formations/structure">Ajouter une structure</a>
                <a href="/governator/formations/branche">Ajouter une branche</a>
            </div>
            <div class="navigation-group">
                <p>Communication</p>
                <a href="/governator/communications/article">Articles</a>
                <a href="/governator/communications/faq">Foire aux Questions</a>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
            </div>
            <div class="navigation-group">
                <p>Personnalisation</p>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
            </div>
            <div class="navigation-group">
                <p>Administration</p>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
                <a href="">Fonction</a>
            </div>
        </div>
        <div class="content">

<!-- DYNAMIC CONTENT -->
@yield('content')

        </div>
    </div>
</div>

<!-- EXTERNAL SCRIPTS -->
<script src="/js/jquery.js"></script>
<!-- INTERNAL SCRIPTS -->
<script src="/js/functions.js"></script>

<!-- DYNAMIC SCRIPTS -->
@yield('script')
</body>
</html>
