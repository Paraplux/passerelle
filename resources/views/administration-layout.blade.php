<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <link rel="shortcut icon" href="/images/logos/favicon-bis.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panneau d'administration</title>

        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/administration.css">
        <link rel="stylesheet" href="/css/flexdatalist.css">
        <link rel="stylesheet" href="/css/flash.css">
        <link rel="stylesheet" href="/css/tags.css">

    </head>

<body>

<div class="admin-wrap">
    <div class="content">

        @yield('content') <!-- DYNAMIC CONTENT -->

    </div>
</div>

<!-- EXTERNAL SCRIPTS -->
<script src="/js/jquery.js"></script>
<!-- INTERNAL SCRIPTS -->
<script src="/js/functions.js"></script>

<script src="//cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
<script src='/js/tags.js'></script>
<script src="/js/flexdatalist.js"></script>
<script src="/js/administration.js"></script>

<!-- DYNAMIC SCRIPTS -->
@yield('script')
</body>
</html>
