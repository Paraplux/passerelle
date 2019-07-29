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
						<h2>Égalité Femme - Homme</h2>
						<p class="icon-links">
							<a href="/mixity.pdf" target="_blank"><i class="fas fa-arrow-right"></i></a>
							<a href="/mixity.pdf" download><i class="fas fa-download"></i></a>
						</p>
					</figcaption>			
                </figure>
                <figure class="effect-zoe">
                        <img class="image-mixity" src="/images/mixity/mixity-pdf-2.png" alt="">
                        <figcaption>
                            <h2>Egalité Femme - Homme 2</h2>
                            <p class="icon-links">
                                <a href="/mixity2.pdf" target="_blank"><i class="fas fa-arrow-right"></i></a>
							    <a href="/mixity2.pdf" download><i class="fas fa-download"></i></a>
                                
                            </p>
                        </figcaption>			
                    </figure>
    </div>
</div>
@endsection