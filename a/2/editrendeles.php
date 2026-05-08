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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['pizzanev']!=""){
            $stmt = $connect->prepare('UPDATE rendeles set pizzanev = :pizzanev, darab = :darab, felvetel = :felvetel, kiszallitas = :kiszallitas where az = :az');
            $stmt->execute(array(':pizzanev' => $_POST['pizzanev'],':darab' => $_POST['darab'],':felvetel' => $_POST['felvetel'],':kiszallitas' => $_POST['kiszallitas'],':az' => $_GET['az'],));
        }
        header("Location: ."); // Go to the main folder
    }
    $stmt = $connect->prepare('SELECT * from rendeles where az = :az');
    $stmt->execute(array(':az' => $_GET["az"]));
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<form method="POST">
    <div class="col-md-6">
        <input type="text" value="<?php echo $userData['pizzanev']; ?>" name="pizzanev" class="form-control" placeholder="Pizza neve"><br />
        <input type="number" value="<?php echo $userData['darab']; ?>" name="darab" class="form-control" placeholder="Rendelt mennyiség"><br />
        <input type="datetime" value="<?php echo $userData['felvetel']; ?>" name="felvetel" class="form-control" placeholder="Felvétel időpontja"><br />
		<input type="datetime" value="<?php echo $userData['kiszallitas']; ?>" name="kiszallitas" class="form-control" placeholder="Kiszállítás időpontja"><br />
        <button class="btn btn-primary">Frissítés</button>
        <a href="."><button class="btn btn-danger">Vissza</button></a>
    </div>
</form>