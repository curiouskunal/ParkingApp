// These are constants used for regular expressions
// Email, checks for @ and dot
const validEmailRegex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
// Number only
const validNumRegex = /^[0-9]*$/;
// Latitude/Longitude can be negative with "number dot number"
const validLongLatRegex = /(-|)\d*\.\d*/;

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

// function that will run when you submit login form
function validateLoginForm(form) {
    // setting form email value
    var email = form.email.value;
    // setting form password value
    var password = form.password.value;

    // if no email value
    if(!email) {
        alert("Please enter a username");
        return false;
    }
    // if the email value does not match the regular expression for emails
    else if (!email.match(validEmailRegex)){
        alert("Please enter a valid email");
        return false;
    }

    // if no password value
    if(!password) {
        alert("Please enter a password");
        return false;
    }

    // return true only if we don't get caught in any of
    // the 'bad' states then we can move on.
    return true;
}

// function that will run when you submit register form
function validateRegisterForm(form) {
    // setting form name value
    var name = form.name.value;
    // setting form email value
    var email = form.email.value;
    // setting form password value
    var password = form.password.value;
    // setting form repeat password value
    var rePassword = form["re-password"].value;

    // if no name value
    if(!name) {
        alert("Please enter your Name");
        return false;
    }

    // if no email value
    if(!email) {
        alert("Please enter a email");
        return false;
    }
    else if (!email.match(validEmailRegex)){
        alert("Please enter a valid email");
        return false;
    }

    // if no password value
    if(!password) {
        alert("Please enter a password");
        return false;
    }
    // if no re-entered password value
    else if (!rePassword){
        alert("Please re-enter your password");
        return false;
    }
    // if passwords don't match
    else if (password != rePassword){
        alert("Your passwords do not match");
        return false;
    }

    // return true only if we don't get caught in any of
    // the 'bad' states then we can move on.
    return true;
}

// function that will run when you submit search page form
function validateSearchForm(form) {
    // sample good lat - long coordinates
    // 43.257931,-79.917068

    // get min price value
    var minPrice = form.MinPrice.value;
    // get max price value
    var maxPrice = form.MaxPrice.value;
    // get adress value
    var address = form.address.value;
    // get distance value
    var distance = form.distance.value
    // get min rating
    var minRating = document.getElementById("search-min-rating").value;
    // get max rating
    var maxRating = document.getElementById("search-max-rating").value;

    // if the user gives coordinate instead of a address.
    // it will be 2 numbers saved into a array, location.
    var location = address.split(',');

    // if there isn't a min price
    if (!minPrice){
        alert("Please enter Minimum Price");
        return false;
    }
    // if the min price contains invlaid character
    else if (!minPrice.match(validNumRegex)){
        alert("Please enter a positive integer Minimum Price");
        return false;
    }

    // if there isn't a max price
    if (!maxPrice){
        alert("Please enter Minimum Price");
        return false;
    }
    // if the max price contains invlaid character
    else if (!maxPrice.match(validNumRegex)){
        alert("Please enter a positive integer Maximum Price");
        return false;
    }

    // if there isn't a adress value
    if (!address){
        alert("Please enter Location or Address");
        return false;
    }

    // if there are more than 2 or 0 inputs for address, we only want 1 or 2
    if (location.length > 2 || location.length == 0){
        alert("Please enter address or latitude longitude coordinates");
        return false;
    }
    // if the longitude and latitude are outside thier bounds
    else if (location[0]>90 || location[0]<-90 || location[1]>180 || location[1]<-180) {
        alert("Invalid Location Coordinates");
        return false;
    }

    // if there isn't a distance value
    if (!distance){
        alert("Please enter Distance");
        return false;
    }
    // if distance does not match the number regular expression
    else if (!distance.match(validNumRegex)){
        alert("Please enter a positive integer Distance");
        return false;
    }

    // if min rating is larger than the max rating
    if (minRating > maxRating){
        alert("Minimum Rating can't be larger than Maximum Rating");
        return false;
    }

    // return true only if we don't get caught in any of
    // the 'bad' states then we can move on.
    return true;
}

// get current location from browser - from https://www.w3schools.com/html/html5_geolocation.asp
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
// fill the location in the address bar - from https://www.w3schools.com/html/html5_geolocation.asp
function showPosition(position) {
    document.getElementById("search-location").value = position.coords.latitude + "," + position.coords.longitude;
}


// function that will run when you submit search bar form
function validateSearchBarForm(form) {

    // get min price value
    var minPrice = form.MinPrice.value;
    // get max price value
    var maxPrice = form.MaxPrice.value;
    // get distance value
    var distance = form.distance.value
    // get min rating
    var minRating = document.getElementById("search-min-rating").value;
    // get max rating
    var maxRating = document.getElementById("search-max-rating").value;

    // if there isn't a min price
    if (!minPrice){
        alert("Please enter Minimum Price");
        return false;
    }
    // if the min price contains invlaid character
    else if (!minPrice.match(validNumRegex)){
        alert("Please enter a positive integer Minimum Price");
        return false;
    }

    // if there isn't a max price
    if (!maxPrice){
        alert("Please enter Minimum Price");
        return false;
    }
    // if the max price contains invlaid character
    else if (!maxPrice.match(validNumRegex)){
        alert("Please enter a positive integer Maximum Price");
        return false;
    }

    // if there isn't a distance value
    if (!distance){
        alert("Please enter Distance");
        return false;
    }

    // if distance does not match the number regular expression
    else if (!distance.match(validNumRegex)){
        alert("Please enter a positive integer Distance");
        return false;
    }

    // if min rating is larger than the max rating
    if (minRating > maxRating){
        alert("Minimum Rating can't be larger than Maximum Rating");
        return false;
    }

    // return true only if we don't get caught in any of
    // the 'bad' states then we can move on.
    return true;
}



function validateSubmission(form) {

    // get the name from from
    var name = form.Name.value;
    // get the discription from from
    var discription = form.Discription.value;
    // get the long from from
    var long = form.longitude.value;
    // get the lat from from
    var lat = form.latitude.value;


    // if there is no name value
    if (!name){
        alert("Please enter your Name");
        return false;
    }
    // if there is no discription value
    if (!discription){
        alert("Please enter a discription");
        return false;
    }

    // if there is no latatude value
    if (!lat){
        alert("Please enter a latitude coordinate");
        return false;
    }
    // if the latatude is not with the bounds
    else if (lat>90 || lat<-90){
        alert("Latitude coordinate invalid");
        return false;
    }

    // if there is no longatude value
    if (!long){
        alert("Please enter a longitude coordinate");
        return false;
    }
    // if the longatude value isnt within the bounds
    else if (long>180 || long<-180){
        alert("Longitude coordinate invalid");
        return false;
    }

    // return true only if we don't get caught in any of
    // the 'bad' states then we can move on.
    return true;
}
