<!DOCTYPE html>
<html lang = "en">
<head>
    <title> Parking App </title>
    <meta charset="utf-8" />
    <meta name="author" content="Kunal Shah" />
    <meta name="description" content="Kunal's Parking App Assignment for COMPSCI 4WW3" />
    <meta name="keywords" content="assignemnt, parking, 4ww3" />
    <meta name="robots" content="noindex" />

    <link rel="icon" type="image/png" sizes="32x32" href="resources/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/icons/favicon-16x16.png">

    <meta property="og:image:width" content="700">
    <meta property="og:image:height" content="366">
    <meta property="og:title" content="Parking App">
    <meta property="og:description" content="Web app that allows you to search and reserve nearby parking spots">
    <meta property="og:url" content="kunalshah.ca/ParkingApp">
    <meta property="og:image" content="resources/images/parking-lot.jpg">

    <link href="resources/style/normalize.css" rel="stylesheet" type="text/css">
    <!-- Global CSS for common style -->
    <link href="resources/style/main.css" rel="stylesheet" type="text/css">

    <!-- Additional tags here from parent file -->
    <?php if (function_exists('customPageStyle')){
      customPageStyle();
    }?>

    <script src="./resources/err.js"></script>

    <!-- import Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
  integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
  integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
  crossorigin=""></script>

</head>
