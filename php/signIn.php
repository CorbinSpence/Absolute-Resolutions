<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    $userID = '';
    $userFullName = '';
    session_start();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT email, userPassword, userID, name FROM users2"); #change from users2 to users
        $query->execute();
        $array = $query->fetchAll();
        foreach ($array as $row) {
            if ($row[0] == $email && $row[1] == $password) {
                    $guard = true;
                    $userID = $row[2];
                    $userFullName = $row[3];
            }
        }
            if ($guard) {
                $_SESSION["username"] = $userFullName;
                $_SESSION["userID"] = $userID;
                include '../html/account/signedIn.html';
            } else {
                session_destroy();
                include '../html/account/signIn.html'; //show that sign in do not match somehow
            }
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>