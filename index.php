<?php
// $PageTitle="New Page Title";

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/index.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

$current="index";
include('header.php');
?>

<!-- Page wrap my div contains all the content of the page. Eesentially containing the body content-->
<div class=page-wrap>
    <!-- horizontal wrapper section has flex-box styling to horizontal center -->
    <div class="horizontal-wrapper">
        <div id="login">
            <!-- Form element for login, It will go to search.php page when you click submit -->
            <form id="loginForm" action="search.php" onsubmit="return validateLoginForm(this)">
                <fieldset>
                    <legend>Login</legend>
                    <label for="login-email">Email:</label>
                    <input id="login-email" type="email" name="email"><br>
                    <label for="login-password">Password:</label>
                    <input id="login-password" type="password" name="password"><br>
                    <!-- using this div to center the submit button -->
                    <div class="center">
                        <input class="submit-button" type="submit" value="Login">
                    </div>
                </fieldset>
            </form>
            <div id="register">
                <p>Don't Have an account?</p>
                <!-- using this div to center the submit button -->
                <div class="center">
                    <!-- using an 'a' element because If I used <button> you can not re-direct to another page without javascript-->
                    <a href="register.php"> Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
