<?php
  include 'db_connect.php';
  $stmt = $connect->prepare('SELECT * FROM rendeles Order by az');
  $stmt->execute();
?>
<a href="submitrendeles" class="createbtn"><button class="btn btn-primary">Rendelési adatok hozzáadása</button></a>
<a href="../" class="backbtn"><button class="btn btn-danger">Vissza</button></a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Azonosító</th>
      <th>Pizza neve</th>
      <th>Rendelt mennyiség</th>
      <th>Rendelés felvétele</th>
	    <th>Kiszállítás időpontja</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
      <th><?php echo $data['az']; ?></th>
      <th><?php echo $data['pizzanev']; ?></th>
      <td><?php echo $data['darab']; ?></td>
      <td><?php echo $data['felvetel']; ?></td>
	  <td><?php echo $data['kiszallitas']; ?></td>
      <td>
        <?php
            echo '<a href="edituser?az='.$data['az'].'"><button class="btn btn-primary">Szerkesztés</button></a> ';
            echo '<a href="deleteuser?az='.$data['az'].'"><button class="btn btn-danger">Törlés</button></a>';
        ?>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>