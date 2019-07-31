@extends('public-layout')
@section('title', 'Cartographie Passerelle Numérique')

@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>
<link rel="stylesheet" href="/css/cartographie.css">
<link rel="stylesheet" href="/css/navigation.no-transparent.css">
<link rel="stylesheet" href="/css/MarkerCluster.Default.css">
@endsection

@section('content')
<div class="cartographie-page">
    <h1 class="title-1">Cartographie Passerelle Numérique</h1>
    <strong>{!! $content->map_text !!}</strong>
    <div id="map"></div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
<script src="\js\leaflet.markercluster.js"></script>
<script>

let structures = {!! json_encode($structures->toArray(), JSON_HEX_TAG) !!}
let partenaires = {!! json_encode($partenaires->toArray(), JSON_HEX_TAG) !!}

var map = L.map('map').setView([50.2836206213, 2.74077726899], 9);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



var structuresMarkers = L.markerClusterGroup();

structures.forEach(function(structure){
    coord = structure.commune.coords.split(',')
    lat = parseFloat(coord[0])
    lon = parseFloat(coord[1])
    title = '<h2>' + structure.name + '</h2><p class="text-main">' + structure.adress + '<br>'+ structure.commune.nom_commune + '<br>' + structure.phone + '<br>' + structure.mail + '</p>'

    marker = L.marker(L.latLng(lat, lon), {title : title })
    marker.bindPopup(title)
    structuresMarkers.addLayer(marker);
})

map.addLayer(structuresMarkers);

var partenairesMarkers = L.markerClusterGroup();

partenaires.forEach(function(partenaire){
    coord = partenaire.commune.coords.split(',')
    lat = parseFloat(coord[0])
    lon = parseFloat(coord[1])

    title = '<h2>' + partenaire.name + '</h2><p class="text-main">' + partenaire.adress + '<br>'+ partenaire.commune.nom_commune + '<br>' + partenaire.phone + '<br>' + partenaire.mail + '</p>'

    marker = L.marker(L.latLng(lat, lon), {title : title})
    marker.bindPopup(title)
    partenairesMarkers.addLayer(marker);
})

map.addLayer(partenairesMarkers);


// function onMapClick(e) {
//     alert("You clicked the map at " + e.latlng);
// }

map.on('click', onMapClick);
</script>
@endsection