<?php
    session_start();
    $account = "Sign in";
    $link = "../account/signInPage.php";
    $loggedIn = false;
    if (isset($_SESSION["username"])) {
        $account = "Welcome, " . $_SESSION["username"];
        $link = "";
        $loggedIn = true;
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <title>TBD</title>
    <!-- <link rel="shortcut icon" src="../img/qstion.webp">
    <meta charset="utf-8">
    <meta name="description" content="A website offering ways of getting in shape!">
    <meta name="keywords" content="fitness, shape up, strong, muscles, relax"> -->
</head>

    <?php   
        $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/CSCI4300-Final-Project/php/nav-bar.php";
        include $IPATH;
    ?>

</html>