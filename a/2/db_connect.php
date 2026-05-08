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
?>