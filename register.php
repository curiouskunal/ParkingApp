<?php
// $PageTitle="New Page Title";

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/register.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');
?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <div id="login">
            <form id="signupForm" action="search.php" method="post" onsubmit="return validateRegisterForm(this)">
                <fieldset>
                    <legend>Sign Up</legend>
                    <label for="signup-name">Full Name:</label>
                    <input id="signup-name" type="text" name="name"><br>

                    <label for="signup-email">Email:</label>
                    <input id="signup-email" type="email" name="email" value="">
                    <br>
                    <label for="signup-password">Password:</label>
                    <input id="signup-password" type="password" name="password" value=""><br>
                    <label for="signup-re-password">Retype Password:</label>
                    <input id="signup-re-password" type="password" name="re-password" value=""><br>
                    <div class="center">
                        <input class="submit-button" type="submit" value="Submit" name="submit">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
