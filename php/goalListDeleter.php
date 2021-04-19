<?php
    $dsn = 'mysql:host=localhost;dbname=bettereveryday';
    $dbUsername = 'root';
    $dbPassword = '';
    $guard = false;
    if (isset($_POST['goalID'])) {
        $goalID=($_POST['goalID']);
    }
    session_start();
    try {
        $db = new PDO($dsn, $dbUsername, $dbPassword);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $db->prepare('DELETE FROM goalslist WHERE goalID = :goalID');
                $query->bindParam(':goalID', $goalID);
                $query->execute();
                header("Location:../html/tracker.php");

        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
    $db = null;
?>