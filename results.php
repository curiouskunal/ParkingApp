<?php
session_start();
include 'helper.php';

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/results.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');

ini_set('display_errors', 1);


$minPrice = $_GET["MinPrice"];
$maxPrice = $_GET["MaxPrice"];
$latitude = $_GET["Latitude"];
$longitude = $_GET["Longitude"];
$distance = $_GET["distance"];
$minRating = $_GET["MinRating"];
$maxRating = $_GET["MaxRating"];


?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <form action="results.php" id="ParkingSearch" onsubmit="return validateSearchBarForm(this)">
            <fieldset>
                <!-- legend for accessibility suport -->
                <legend>Search Results</legend>
                <div id="ParkingSearch_flex">
                    <div id="Price_flex">
                        <div>
                            <label for="search-min-price">Minimum Price:</label>
                            <input id="search-min-price" type="number" name="MinPrice" min="0">
                        </div>
                        <div>
                            <label for="search-max-price">Maximum Price:</label>
                            <input id="search-max-price" type="number" name="MaxPrice" min="0">
                        </div>
                    </div>
                    <div id="Dis_rating_flex">
                        <div>
                            <label for="search-distance">Distance:</label>
                            <input id="search-distance" type="number" name="distance" min="0">
                        </div>
                        <div>
                            <label for="search-min-rating">Rating:</label>
                            <!-- select is used for a dropdown to select the min and max rating system-->
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
                        </div>
                    </div>
                    <div class = center>
                        <input class="submit-button" type="submit" value="Search">
                </div>
            </div>
            </fieldset>
        </form>
    </div>

    <div class="center">
        <!-- <img src="resources/images/Large_parking-spot_map.png" alt="Parking Map"> -->
        <div id="mapid"></div>
    </div>

    <div class="horizontal-wrapper">
        <div class="results">
            <table id="resultsTable">
                <tr>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>  </th>
                </tr>

                <?php
                    try {
                        $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $result = $pdo->query("SELECT * FROM parkingspot");

                        foreach ($result as $ROW) {
                            $newPID = $ROW['pid'];
                            $ratingResult = $pdo->query("SELECT avg(rating) FROM reviews WHERE pid= $newPID");
                            $avgRating = round($ratingResult->fetchAll()[0][0],5);
                            echo '<tr><td>';
                            echo($ROW["name"]);
                            echo '</td><td>';
                            echo($ROW["latitude"]);
                            echo(" , ");
                            echo($ROW["longitude"]);
                            echo '</td><td>';
                            echo($ROW["price"]);
                            echo '</td><td>';
                            echo($avgRating);
                            echo '</td><td>';
                            echo '<a class="submit-button" href="parking.php?parking=',$ROW['pid'],'"> Details </a>';
                            echo("</td></tr>");
                        }

                    }
                    catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                ?>

                <!--
                <tr>
                    <td>Lot M - Spot 1A</td>
                    <td>0.5 KM</td>
                    <td>$50</td>
                    <td>★★★☆☆</td>
                    <td><a class="submit-button" href="parking.php"> Details </a></td>
                </tr>
                <tr>
                    <td>Lot M - Spot 1B</td>
                    <td>0.5 KM</td>
                    <td>$50</td>
                    <td>★★★☆☆</td>
                    <td><a class="submit-button" href="parking.php"> Details </a></td>
                </tr>
                <tr>
                    <td>Lot M - Spot 1C</td>
                    <td>0.5 KM</td>
                    <td>$50</td>
                    <td>★★★☆☆</td>
                    <td><a class="submit-button" href="parking.php"> Details </a></td>
                </tr> -->
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
