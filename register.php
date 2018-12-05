<?php
session_start();

$_SESSION['loggedIn'] = 'false';

function customPageStyle(){?>
    <!-- File specific CSS for-->
    <link href="resources/style/register.css" rel="stylesheet" type="text/css">
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
    $uid = $pdo->lastInsertId();

    $_SESSION["uid"] = $uid;
    $_SESSION["name"] = $name;
    $_SESSION['loggedIn'] = 'true';

    header("Location: search.php");
}

?>

<div class=page-wrap>
    <div class="horizontal-wrapper">
        <div id="login">
            <form id="signupForm" action="<?php echo $PHP_SELF;?>" method="post" onsubmit="return validateRegisterForm(this)">
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
