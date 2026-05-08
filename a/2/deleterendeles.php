<?php
    $servername = "mysql.omega:3306";
    $username = "pizza";
    $password = "pizza20260502";
    $dbname = "pizza";
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