// map location is set when the page is loaded.
// saved to global variable mymap
var mymap = L.map('mapid').setView([43.257931,-79.917068], 15);

// adding the maps api key to mymap , copied from Mapbox
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic2hhaGsyNCIsImEiOiJjam9kOGl3cm8wdG8xM3BvMTNtcWpyOG91In0.ryfTnBF5J8RAoWrTcSZS8A', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

// setting and adding the dummy data marker to mymap
var marker = L.marker([43.257931,-79.917068]).addTo(mymap);

// setting and adding the distance radias of the dummy data point to mymap, with radius 500 m
var circle = L.circle([43.257931,-79.917068], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.1,
    radius: 500
}).addTo(mymap);

// setting and adding marker title to mymap
marker.bindPopup("<b>Parking Spot A</b>").openPopup();
