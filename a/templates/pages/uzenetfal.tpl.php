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
?>
<?php
if(isset($_SESSION["login"])) {
?>
<table>
    <h1>Üzenetek</h1>
    <th>Küldő</th>
    <th>Üzenet</th>
    <th>Dátum</th>
<?php
	  	$stmt = $connect->prepare('SELECT * FROM uzenetek ORDER BY mikor DESC');
  		$stmt->execute();
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>


    <tr>
        <td><?php echo $data['kuldo']; ?></td>
        <td><?php echo $data['kuzenet']; ?></td>
        <td><?php echo $data['mikor']; ?></td>
    </tr>


 <?php
        }
    ?>

</table>
<?php } else { ?> <h2>Nincs bejelentkezve!</h2> <?php } ?>

