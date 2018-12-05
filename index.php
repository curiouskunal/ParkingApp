<?php
session_start();
include 'helper.php';

$_SESSION['loggedIn'] = 'false';

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/index.css" rel="stylesheet" type="text/css">
<?php }

include('html_head.php');

include('header.php');


if( isset( $_POST["login"] ) ){

    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=parkingapp', 'web', '4ww3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        if ($result->rowCount() > 0) {
            foreach ($result as $ROW) {
                $_SESSION["uid"] = $ROW['uid'];
                $_SESSION["name"] = $ROW['name'];
                $_SESSION['loggedIn'] = 'true';
                // echo '<script>alert(',$_SESSION["uid"],');</script>';

            }
            header("Location: search.php");
        } else {
            $_SESSION['loggedIn'] = 'false';
            showError("Email or Password is incorrect");
        }

    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>

<!-- Page wrap my div contains all the content of the page. Eesentially containing the body content-->
<div class=page-wrap>
    <!-- horizontal wrapper section has flex-box styling to horizontal center -->
    <div class="horizontal-wrapper">
        <div id="login">
            <!-- Form element for login, It will go to search.php page when you click submit -->
            <form id="loginForm" action="<?php echo $PHP_SELF;?>" method="post" onsubmit="return validateLoginForm(this)">
                <fieldset>
                    <legend>Login</legend>
                    <label for="login-email">Email:</label>
                    <input id="login-email" type="email" name="email"><br>
                    <label for="login-password">Password:</label>
                    <input id="login-password" type="password" name="password"><br>
                    <!-- using this div to center the submit button -->
                    <div class="center">
                        <input class="submit-button" type="submit" name="login">
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
