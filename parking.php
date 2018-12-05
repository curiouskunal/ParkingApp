<?php
session_start();
function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/parking.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

include('header.php');


$name;
$price;
$discription;
$longitude;
$latitude;
$pid;
$uid = $_SESSION["uid"];

function loadQuery() {

    $GLOBALS['pid']= $_GET['parking'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query("SELECT * FROM parkingspot WHERE pid= '$GLOBALS[pid]'");


        foreach ($result as $ROW) {
            $GLOBALS['name'] = $ROW['name'];
            $GLOBALS['price'] = $ROW['price'];
            $GLOBALS['discription'] = $ROW['discription'];
            $GLOBALS['longitude'] = $ROW['longitude'];
            $GLOBALS['latitude'] = $ROW['latitude'];
        }

    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// ini_set('display_errors', 1);
// if( isset( $_POST["submit"] ) ){
//     $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');
//
//     $uid = "1";
//     $name = $_POST["Name"];
//     $price = $_POST["Price"];
//     $discription = $_POST["Discription"];
//     $longitude = $_POST["longitude"];
//     $latitude = $_POST["latitude"];
//     $photo = $_POST["myFile"];
//
//     $sql = 'INSERT INTO parkingspot(uid, name, discription, longitude, latitude, photo, price) VALUES(:uid, :name, :discription, :longitude, :latitude, :photo, :price)';
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(':uid', '1');
//     $stmt->bindValue(':name', $name);
//     $stmt->bindValue(':discription', $discription);
//     $stmt->bindValue(':longitude', $longitude);
//     $stmt->bindValue(':latitude', $latitude);
//     $stmt->bindValue(':photo', $photo);
//     $stmt->bindValue(':price', $price);
//     $stmt->execute();
//     $pid = $pdo->lastInsertId();
// }elseif( isset( $_POST["reviewSubmit"] ) ){
if( isset( $_POST["reviewSubmit"] ) ){

    $pid= $_GET['parking'];

    $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');

    $review = $_POST["review"];
    $rating = $_POST["rating"];

    $sql = 'INSERT INTO reviews(uid, pid, rating, review) VALUES(:uid, :pid, :rating, :review)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':uid', $uid);
    $stmt->bindValue(':pid', $pid);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':review', $review);
    $stmt->execute();

    loadQuery();

}else{
    loadQuery();
}
?>

<div class=page-wrap>

    <div class="horizontal-wrapper">
        <div class="center">
            <h1> <?php echo($name);?> </h1>
        </div>
    </div>

    <div class="horizontal-wrapper">
        <div class="left">
            <!-- <img id="map" src="resources/images/parking-spot_map.png" alt="Parking Location Map"> -->
            <div id="mapid"></div>
        </div>

        <div class="right">
            <img id="ParkingSpot" src="resources/images/parking-spot.jpg" alt="Parking spot">
            <table>
                <tr>
                    <th>
                        Name:
                    </th>
                    <th>
                        <?php echo($name);?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Price:
                    </th>
                    <th>
                        <?php echo($price);?>
                    </th>
                </tr>
                <tr>
                    <th>
                        Distance:
                    </th>
                    <th>
                        0.5 KM
                    </th>
                </tr>
                <tr>
                    <th>
                        Location:
                    </th>
                    <th>
                        <?php echo($longitude);?> , <?php echo($latitude);?>
                    </th>
                </tr>
            </table>
            <a class="current" href="#"> Reserve now </a>
        </div>
    </div>

    <div class="horizontal-wrapper">
        <div class="center width">
            <div class="reviews">

                <div id="submitReview">
                    <form id="reviewform" action="parking.php?parking=<?=$pid?>" method="post" onsubmit="return true">
                        <fieldset>
                            <textarea id="ParkingSpotDiscription" rows="4" cols="50" name="review" form="reviewform" placeholder="Enter Your review here"></textarea><br>
                            <div class=rating>
                            <label for="review-rating">Rating:</label>
                                <select id="review-rating" name="rating">
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            <input class="submit-button" type="submit" value="Submit" name="reviewSubmit">
                        </fieldset>
                    </form>
                </div>

                <table>
<!--                     <tr>
                        <td>
                            <div>
                                <img class="reviewProfileImage" src="resources/images/profile_small.png" alt="Reviewer Profile Photo">
                                <span>Kunal Shah</span>
                                <span class="stars">
                                    5
                                </span>
                            </div>
                            <p>The review goes here</p>
                        </td>
                    </tr> -->

                    <?php
                        if(!!$pid){
                            try {
                                $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $result = $pdo->query("SELECT * FROM reviews where pid = $pid");

                                if ($result->rowCount()>0){
                                    foreach ($result as $ROW) {
                                        $reviewer_uid = $ROW['uid'];
                                        $reviewer = $pdo->query("SELECT * FROM users WHERE uid = $reviewer_uid");
                                        $reviewer_name = $reviewer->fetchAll()[0]['name'];
                                        echo '<tr><td><div>';
                                        echo '<img class="reviewProfileImage" src="resources/images/profile_small.png" alt="Reviewer Profile Photo">';
                                        echo '<span>',$reviewer_name,'</span>';
                                        echo '<span class="stars">',$ROW['rating'],'/5</span>';
                                        echo '</div><p>',$ROW['review'],'</p></td></tr>';
                                    }
                                }else{
                                    echo '<tr><td><p class="center"> No Reviews </p></td></tr>';
                                }

                            }
                            catch (PDOException $e) {
                                echo $e->getMessage();
                            }
                        }else{
                            echo '<tr><td><p class="center"> No Reviews </p></td></tr>';
                        }

                    ?>

                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
