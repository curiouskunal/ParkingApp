<?php
// $PageTitle="New Page Title";

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/profile.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');
?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <!-- left for desktop left. this will be on top in mobile -->
            <div class="left">
                <div class="requests">
                    <h2>Incoming Requests</h2>

                    <div id="incoming" class="profileTables">
                            <table class="requestTable">
                                <tr>
                                    <th>Client</th>
                                    <th>Spot</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                </tr>
                                <tr>
                                    <td>Dr. Mostafa Milan</td>
                                    <td>Driveway</td>
                                    <td>$5</td>
                                    <td>October 14</td>
                                    <td>Full Day</td>
                                </tr>
                                <tr>
                                    <td>Dr. Mostafa Milan</td>
                                    <td>Driveway</td>
                                    <td>$5</td>
                                    <td>October 14</td>
                                    <td>Full Day</td>
                                </tr>
                                <tr>
                                    <td>Dr. Mostafa Milan</td>
                                    <td>Driveway</td>
                                    <td>$5</td>
                                    <td>October 14</td>
                                    <td>Full Day</td>
                                </tr>
                            </table>
                    </div>
                </div>
                <div class="requests">
                    <h2>Outgoing Requests</h2>
                    <div id="outgoing" class="profileTables">
                        <table class="requestTable">
                            <tr>
                                <th>Date</th>
                                <th>Spot</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Location</th>
                            </tr>
                            <tr>
                                <td>October 14</td>
                                <td>Lot M - Spot 1A</td>
                                <td>$30</td>
                                <td>Full Day</td>
                                <td>McMaster University, lot M, Hamilton, ON L8N 1E9</td>
                            </tr>
                            <tr>
                                <td>October 14</td>
                                <td>Lot M - Spot 1A</td>
                                <td>$30</td>
                                <td>Full Day</td>
                                <td>McMaster University, lot M, Hamilton, ON L8N 1E9</td>
                            </tr>
                            <tr>
                                <td>October 14</td>
                                <td>Lot M - Spot 1A</td>
                                <td>$30</td>
                                <td>Full Day</td>
                                <td>McMaster University, lot M, Hamilton, ON L8N 1E9</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="requests">
                    <h2>My Spots</h2>
                    <div id="MySpots" class="profileTables">
                        <table class="requestTable">
                            <tr>
                                <th>Spot</th>
                                <th>Price</th>
                                <th>Availability</th>
                                <th>Location</th>
                            </tr>
                            <tr>
                                <td>Driveway</td>
                                <td>$5 / day</td>
                                <td>9-5 Weekedays</td>
                                <td>1 University St, Hamilton ON</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class=right>
                <div class="mobileLeft">
                    <img class="profile_photo" src="resources/images/profile_large.png" alt="Available Parking Spot Map">
                </div>
                <div class="mobileRight">
                    <div>
                        <h2> Kunal Shah </h2>
                        <h3> email@example.com </h3>
                        <button class="submit-button">Logout</button>
                    </div>
                </div>
            </div>

    </div>
</div>

<?php include('footer.php'); ?>
