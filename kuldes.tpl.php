<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gyakorlat7";
    try {
        $connect = new PDO("mysql:host=" . $servername . "; dbname=" . $dbname, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD']=="POST") {
		if(isset($_SESSION['login'])){
			$stmt = $connect->prepare('INSERT into uzenetek (kuldo, kuzenet) VALUES (:kuldo, :szoveg)');
			$stmt->execute(array(':kuldo'=> $_SESSION['login'], ':szoveg' => $_POST['szoveg']));
			echo "Üzenetét rögzítettük!";
		} else {
			$stmt = $connect->prepare('INSERT into uzenetek (kuldo, kuzenet) VALUES (:kuldo, :szoveg)');
			$stmt->execute(array(':kuldo'=> "Vendég", ':szoveg' => $_POST['szoveg']));
			echo "Üzenetét rögzítettük!";
		}
		// ??? Ilyen szerintem nem lesz az ellenőrző szkript miatt ???
		if(!isset($_POST["szoveg"])){
	    echo "Sajnos nem sikerült az üzenetét rögzíteni!";
		}
		}
?>