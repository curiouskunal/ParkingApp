// map location is set when the page is loaded.
// saved to global variable mymap

var mymap;
// rad in metter
function mapinit(long, lat, rad){
    mymap = L.map('mapid').setView([long,lat], 15);
    // adding the maps api key to mymap , copied from Mapbox
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic2hhaGsyNCIsImEiOiJjam9kOGl3cm8wdG8xM3BvMTNtcWpyOG91In0.ryfTnBF5J8RAoWrTcSZS8A', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

    setMarker("Current Location",long,lat);

    var radias = new L.circle([long,lat], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.1,
        radius: rad
    }).addTo(mymap);
}

function setMarker(name, long, lat){
    // setting and adding the parking spot  marker to mymap
    var marker = new L.marker([long,lat]).addTo(mymap);
    // setting and adding marker title to mymap
    marker.bindPopup("<b> "+ name +" </b>").openPopup();
}

function setMap(long, lat){
    mymap.setView(new L.LatLng(long, lat), 15);
}

function parkingPin(long, lat, name){
    mymap = L.map('mapid').setView([long,lat], 15);
    // adding the maps api key to mymap , copied from Mapbox
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic2hhaGsyNCIsImEiOiJjam9kOGl3cm8wdG8xM3BvMTNtcWpyOG91In0.ryfTnBF5J8RAoWrTcSZS8A', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

    setMarker(name,long,lat);
}
