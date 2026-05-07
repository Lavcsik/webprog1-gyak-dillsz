<?php
    // Alkalmazás logika:
    include('includes/config.inc.php');
    
    // adatok összegyűjtése:    
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);
    
    // Megjelenítés logika:
?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <h1 class="cimzet">Galéria</h1>
    <style type="text/css">
        .cimzet{text-align:center;}
        div#galeria {margin: 0 auto; width: 100%; max-width: 1400px;
                    display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;}
        div.kep { display: inline-block;}
        div.kep img { width: 100%; height: auto; float:none; display:block;  }

    </style>
</head>
<body>
    <div id="galeria">
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <p>Név:  <?php echo $fajl; ?></p>
            <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>
    </div>
</body>
</html>
