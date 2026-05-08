<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beadando";
    try {
        $connect = new PDO("mysql:host=" . $servername . "; dbname=" . $dbname, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $stmt = $connect->prepare('DELETE from rendeles where az = :az');
    $stmt->execute(array(':az' => $_GET["az"]));
    header("Location: .");  // Go to the main folder
?>