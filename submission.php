<?php
// $PageTitle="New Page Title";

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/submission.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');
?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <div id="login">
            <form id="ParkingSubmition" action="parking.php" method="post" onsubmit="return validateSubmission(this)">
                <fieldset>
                    <legend>Register Parking Spot</legend>
                    <label for="ParkingSpotName">Parking Spot Name:</label>
                    <input id="ParkingSpotName" type="text" name="Name" placeholder="Lot , Spot Number"><br><br>
                    <lable for="ParkingSpotPrice">Price:</lable>
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
