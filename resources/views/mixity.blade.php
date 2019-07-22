@extends('public-layout')

@section('title', 'Égalité')

@section('style')
<link rel="stylesheet" href="/css/mixity.css">
@endsection

@section('content')
<div class="mixity-page">

    <div class="header">
        <img src="/images/mixity/mixity.jpg" alt="" class="mixity-background">
        <div class="typewriter">Mixités</div>
    </div>
    <div class="contenu">
            <div class="grid">
				<figure class="effect-zoe">
                    <img class="image-mixity" src="/images/mixity/mixity-pdf-1.png" alt="">
					<figcaption>
						<h2>1er <span>PDF</span></h2>
						<p class="icon-links">
							<a href="/images/mixity/Barry.gif"><i class="fas fa-arrow-right"></i></a>
							<a href="/images/mixity/Barry.gif" download="Barry.gif"><i class="fas fa-download"></i></a>
						</p>
						<p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
					</figcaption>			
                </figure>
                <figure class="effect-zoe">
                        <img class="image-mixity" src="/images/mixity/mixity-pdf-2.png" alt="">
                        <figcaption>
                            <h2>2nd <span>PDF</span></h2>
                            <p class="icon-links">
                                <a href="/images/mixity/Barry.gif"><i class="fas fa-arrow-right"></i></a>
                                <a href="/images/mixity/Barry.gif" download="Barry.gif"><i class="fas fa-download"></i></a>
                                
                            </p>
                            <p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
                        </figcaption>			
                    </figure>
    </div>
</div>
@endsection