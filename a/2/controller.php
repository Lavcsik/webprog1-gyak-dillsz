<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body class="container">
    <h3 class="text-center">CRUD Alkalmazás</h3>
    <?php
        $route=$_SERVER['QUERY_STRING'];
        if($route=="") include("main.php");
        if($route=="submitrendeles") include("submitrendeles.php");
        if(str_contains($route,"editrendeles")) include("editrendeles.php");
        if(str_contains($route,"deleterendeles")) include("deleterendeles.php");         
    ?>
</body>
</html>