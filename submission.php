<?php
session_start();
include 'helper.php';

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/submission.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');

if ($_SESSION['loggedIn'] == 'true'){
    if( isset( $_POST["submit"] ) ){
        $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');

        $uid = $_SESSION["uid"];
        $name = $_POST["Name"];
        $price = $_POST["Price"];
        $discription = $_POST["Discription"];
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
        $photo = $_POST["myFile"];

        $sql = 'INSERT INTO parkingspot(uid, name, discription, longitude, latitude, photo, price) VALUES(:uid, :name, :discription, :longitude, :latitude, :photo, :price)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', '1');
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':discription', $discription);
        $stmt->bindValue(':longitude', $longitude);
        $stmt->bindValue(':latitude', $latitude);
        $stmt->bindValue(':photo', $photo);
        $stmt->bindValue(':price', $price);
        $stmt->execute();
        $pid = $pdo->lastInsertId();

        header("Location: parking.php?parking=$pid");
    }
} else {
    showError("You must be logged in to submit a parking spot" , "false");
}

?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <div id="login">
            <form id="ParkingSubmition" action="<?php echo $PHP_SELF;?>" method="post" onsubmit="return validateSubmission(this)">
                <fieldset>
                    <legend>Register Parking Spot</legend>
                    <label for="ParkingSpotName">Parking Spot Name:</label>
                    <input id="ParkingSpotName" type="text" name="Name" placeholder="Lot , Spot Number"><br><br>
                    <label for="ParkingSpotPrice">Price:</label>
                    <input id="ParkingSpotPrice" type="number" name="Price" placeholder="Price"><br><br>
                    <label for="ParkingSpotDiscription">Description:</label>
                    <textarea id="ParkingSpotDiscription" rows="4" cols="50" name="Discription" form="ParkingSubmition" placeholder="Discription"></textarea><br>
                    <label for="ParkingSpotLocationLog">Location:</label>
                    <input id="ParkingSpotLocationLog" type="number" step="0.00000001" name="longitude" placeholder="longitude" >
                    <input id="ParkingSpotLocationLat" type="number" step="0.00000001" name="latitude" placeholder="latitude" > <br>
                    <label for="ParkingSpotUpload">Upload Photos or Video:</label>
                    <input id="ParkingSpotUpload" type="file" name="myFile"> <br><br>
                    <div class="center">
                            <input class="submit-button" type="submit" value="Submit" name="submit">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
