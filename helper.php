<?php

function checkNum($number){

}
function checkString($string){

}
function checkLat($lat){

}
function checkLong($long){

}
function checkEmail($email){

}

function showError($msg, $timeout = "true"){
    echo '<p class="center msgBanner">',$msg,' </p>';
    if ($timeout == "true"){
        echo '<script>errorMessage();</script>';
    }
}




?>
