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
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        if($_POST['pizzanev']!=""){
            $stmt = $connect->prepare('INSERT into rendeles (pizzanev, darab, felvetel, kiszallitas) VALUES (:pizzanev, :darab, :felvetel, :kiszallitas)');
            $stmt->execute(array(':pizzanev' => $_POST['pizzanev'],':darab' => $_POST['darab'],':felvetel' => $_POST['felvetel'], ':kiszallitas' => $_POST['kiszallitas']));
        }
        header("Location: .");  // Go to the main folder
    }
?>
<form method="POST">
    <div class="col-md-6">
        <input type="text" name="pizzanev" class="form-control" placeholder="Pizza neve"><br />
        <input type="number" name="darab" class="form-control" placeholder="Rendelt mennyiség"><br />
        <input type="datetime" name="felvetel" class="form-control" placeholder="Felvétel időpontja"><br />
		<input type="datetime" name="kiszallitas" class="form-control" placeholder="Kiszállítás időpontja"><br />
        <button  class="btn btn-primary">Submit</button>
        <a href="."><button class="btn btn-danger">Main page</button></a>
    </div>
</form>
