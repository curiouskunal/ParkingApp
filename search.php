<?php
// $PageTitle="New Page Title";

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/search.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');

if( isset( $_POST["submit"] ) ){
    $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
}
?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <div id="login">
            <form action="results.php" id="ParkingSubmition" onsubmit="return validateSearchForm(this)">
                <fieldset>
                    <legend>Search</legend>
                    <label for="search-min-price">Minimum Price:</label>
                    <input id="search-min-price" type="number" name="MinPrice" min="0"><br>
                    <label for="search-max-price">Maximum Price:</label>
                    <input id="search-max-price" type="number" name="MaxPrice" min="0"><br>
                    <label for="search-location">Current Location:</label>
                    <input id="search-location" type="text" name="address" placeholder="Current Latitude , Longitude">
                    <a onClick="getLocation()"><i class="fas fa-map-marked-alt"></i></a>
                    <br>
                    <label for="search-distance">Distance:</label>
                    <input id="search-distance" type="number" name="distance" min="0" placeholder="Distance">><br>
                    <div class=rating>
                    <label for="search-min-rating">Rating:</label>
                        <select id="search-min-rating" name="MinRating">
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        to
                        <select id="search-max-rating" name="MaxRating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected="selected">5</option>
                        </select>
                    </div><br>
                    <div class="center">
                        <input class="submit-button" type="submit" value="Search" name="search">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
